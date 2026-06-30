<?php

namespace Drupal\newsletter\Form;

use Drupal\Core\Database\Connection;
use Drupal\Core\Form\ConfirmFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Override;

/**
 * Fomrulario de confirmacion de eliminacion
 */
class SubscriberDeleteForm extends ConfirmFormBase
{
    /** Id que recibimos */
    protected string $id;
    protected Connection $DB;

    public function __construct(Connection $DB)
    {
        $this->DB = $DB;
    }

    /**
     * Conexxion
     */
    public static function create(ContainerInterface $container)
    {
        return new static(
            $container->get('database')
        );
    }

    /**
     * Obtener id
     */
    public function getFormId()
    {
        return 'newsletter_subscriber_delete_form';
    }


    /**
     * Recibir id de la ruta y lo guarda
     * @param array $form
     * @param FormStateInterface $form_state
     */

    public function buildForm(array $form, FormStateInterface $form_state, $id = null)
    {
        $this->id = $id;

        return parent::buildForm($form, $form_state);
    }


    /**
     * 
     * Lanzar mensaje
     */
    public function getQuestion()
    {
        return $this->t('¿Seguro que quieres eliminar este suscriptor?');
    }

    /**
     * Obtener URL
     */
    public function getCancelUrl()
    {
        return new Url('newsletter.admin');
    }


    /**
     * Subir datos del formularios
     * @param array $form
     * @param FormStateInterface $form_state
     */
    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        $this->DB->delete('newsletter_subscribers')
            ->condition('id', $this->id)
            ->execute();

        $this->messenger()->addStatus($this->t('Suscriptor eliminado.'));
        $form_state->setRedirect('newsletter.admin');
    }
}
