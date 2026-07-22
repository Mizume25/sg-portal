<?php


namespace Drupal\newsletter;
use Drupal\Core\Database\Connection;

/**
 * 
 * Serie de consultas DB
 */
class NewsletterSubscriberStorage
{

    protected Connection $DB;

    public function __construct(Connection $DB)
    {
        $this->DB = $DB;
    }


    /**
     * Obtener todos los registros newsletter
     */
    public function all()
    {
        $reg = $this->DB->select('newsletter_subscribers', 'n')
            ->fields('n', ['id', 'name' , 'surname', 'email', 'created'])
            ->orderBy('created', 'DESC')
            ->execute();

        return $reg;
    }

    /**
     * @param $id 
     * Obtener usuario newsletter
     */
    public function get(int $id)
    {
        if (!$id) return;

        $reg = $this->DB->select('newsletter_subscribers', 'n')
            ->fields('n', ['id', 'name' , 'surname', 'email', 'created'])
            ->condition('id', $id)
            ->execute()
            ->fetchAssoc();

        return $reg;
    }


    /**
     * Insertar Datos de un usuario newsletter
     * 
     */
    public function insert(array $data)
    {
        $this->DB->insert('newsletter_subscribers')
            ->fields([
                'name' => $data['name'],
                'surname' => $data['surname'],
                'email' => $data['email'],
                'created' => $data['created'],
            ])
            ->execute();
    }




    /**
     * Actualizar datos de un usuario newsletter
     * @param $id
     */
    public function update(int $id, array $data)
    {
        $this->DB->update('newsletter_subscribers',)
            ->fields([
                'name' => $data['name'],
                'surname' => $data['surname'],
                'email' => $data['email'],
            ])
            ->condition('id', $id)
            ->execute();
    }


    /**
     * Eliminar datos de un usuario newsletter
     * @param $id
     */
    public function delete(int $id)
    {
        $this->DB->delete('newsletter_subscribers')
            ->condition('id', $id)
            ->execute();
    }


    /**
     * Comprobar campo
     * @param $field Id de registro
     * @param $value Campo a comparar
     * @param $excludeId valor de campo
     */
    public function exists(string $field, string $value, ?int $excludeId = null): bool
    {
        /*** Campos que podemos comprobar */
        $allowedFields = ['email', 'name' , 'surname'];

        if (!in_array($field, $allowedFields, true)) throw new \InvalidArgumentException("Campo no permitido: $field");


        /** Constulamos el campo y el valor */
        $query = $this->DB->select('newsletter_subscribers', 'n')
            ->fields('n', ['id'])
            ->condition($field, $value);

        /** En caso de edicion incluimos el id editado */
        if ($excludeId !== null) $query->condition('id', $excludeId, '<>');

        /** Retornamos respuesta */
        return (bool) $query->execute()->fetchField();
    }
}
