<?php

namespace Drupal\newsletter\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Url;
use Drupal\Core\Link;
use Symfony\Component\HttpFoundation\Response;
use Drupal\newsletter\NewsletterSubscriberStorage;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal;

class NewsletterAdminController  extends ControllerBase
{
    protected NewsletterSubscriberStorage $subscribers;

    public function __construct(NewsletterSubscriberStorage $subscribers)
    {
        $this->subscribers = $subscribers;
    }

    public static function create(ContainerInterface $container)
    {
        return new static($container->get('newsletter.subscriber_storage'));
    }


    /**
     * Lista de suscriptores
     */
    public function listSubs()
    {
        $head = [
            $this->t('ID'),
            $this->t('Nickname'),
            $this->t('Email'),
            $this->t('Fecha de alta'),
            $this->t('Operaciones'),
        ];

        /** Obtenemos registros */
        $registers = $this->subscribers->all();


        $rows = [];
        $build = [];

        /** Itera datos */
        foreach ($registers as $reg) {
            $delete = Url::fromRoute('newsletter.delete', ['id' => $reg->id]);
            $edit = Url::fromRoute('newsletter.edit', ['id' => $reg->id]);

            /** Construyendo los datos  */
            $rows[] = [
                $reg->id,
                $reg->nickname,
                $reg->email,
                Drupal::service('date.formatter')->format($reg->created, 'short'),
                Link::fromTextAndUrl($this->t('Editar'), $edit),
                Link::fromTextAndUrl($this->t('Borrar'), $delete)
            ];

            // Botón de exportar arriba de la tabla.
            $build['export'] = [
                '#type' => 'link',
                '#title' => $this->t('Exportar a CSV'),
                '#url' => Url::fromRoute('newsletter.export'),
                '#attributes' => ['class' => ['button', 'button--primary']],
            ];

            // La tabla. Si está vacía, '#empty' muestra un mensaje.
            $build['tabla'] = [
                '#type' => 'table',
                '#header' => $head,
                '#rows' => $rows,
                '#empty' => $this->t('Todavía no hay suscriptores.'),
            ];
        }

        return $build;
    }


    public function exportCsv()
    {

        $reg = $this->subscribers->all();

        // Abrimos un "archivo" en memoria.
        $salida = fopen('php://temp', 'r+');

        // Fila de cabeceras del CSV.
        fputcsv($salida, ['ID', 'NickName',  'Email', 'Fecha de alta']);

        // Una fila por suscriptor.
        foreach ($reg as $r) {
            fputcsv($salida, [
                $r->id,
                $r->nickname,
                $r->email,
                date('d/m/Y H:i', $r->created),
            ]);
        }

        rewind($salida);
        $csv = stream_get_contents($salida);
        fclose($salida);

        // Devolvemos el CSV con cabeceras que fuerzan la descarga.
        $response = new Response($csv);
        $response->headers->set('Content-Type', 'text/csv; charset=utf-8');
        $response->headers->set(
            'Content-Disposition',
            'attachment; filename="suscriptores_newsletter.csv"'
        );
        return $response;
    }
}
