<?php

/** Carpeta del objeto */

namespace Drupal\newsletter\Form;

/** Funciones de formulario */

use Drupal\Core\Form\FormBase;

/** Conneccion a BD */

use Drupal\Core\Database\Connection;
use Drupal\Core\Form\FormStateInterface;
use Drupal;

/** Servicos de Base de datos */

use Symfony\Component\DependencyInjection\ContainerInterface;


/** Objeto que manega altas de usuarios */
class NewsletterSignupForm extends FormBase
{
    /** Variable principal */
    protected Connection $DB;

    /**ss
     * Conexion con BD
     * @param Connection $DB
     */
    public function __construct(Connection $DB)
    {
        $this->DB = $DB;
    }


    /**
     *  Habilitar servicios DATABASE
     *  @param ContainerInterface $container
     */
    public static function create(ContainerInterface $container)
    {
        return new static(
            $container->get('database')
        );
    }



    /**
     * 
     */
    public function getFormId()
    {
        return 'newsletter_signup_form';
    }


    /**
     * $form array de campos
     * FormStateInterface  
     */
    public function buildForm(array $form, FormStateInterface $form_state)
    {

    /** Campo de nicknam */
        $form['nickname'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Tu nickname'), 
            '#required' => TRUE,
        ];
        /**
         * Validando campo de correo electronico
         */
        $form['email'] = [
            '#type' => 'email',
            '#title' => $this->t('Tu correo eletronico'), 
            '#required' => TRUE,
        ];

        /**- Estilo Drupal */
        $form['actions']['#type'] = 'actions';

        /** Action */
        $form['actions']['submit'] = [
            '#type' => 'submit',
            '#value' => $this->t('Suscribirme'),
        ];

        return $form;
    }


    /** 
     * Validacion de datos
     * @param array &$form
     * @param FormStateInterface $form_state
     * 
     */
    public function validateForm(array &$form, FormStateInterface $form_state)
    {
        $existEmail = $this->DB->select('newsletter_subscribers', 'n')
            ->fields('n', ['id'])
            ->condition('email', $form_state->getValue('email'))
            ->execute()
            ->fetchField();

        if ($existEmail) $form_state->setErrorByName('email', $this->t('Este email ya esta suscrito'));


        $existNickName = $this->DB->select('newsletter_subscribers', 'n')
            ->fields('n', ['id'])
            ->condition('nickname', $form_state->getValue('nickname'))
            ->execute()
            ->fetchField();

        if ($existNickName) $form_state->setErrorByName('nickname', $this->t('Este nickname ya esta suscrito'));
    }



    /**
     * Subir datos del formulario
     * @param array $form
     * @param FormStateInterface $form_state
     */
    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        $this->DB->insert('newsletter_subscribers')
            ->fields([
                'nickname' => $form_state->getValue('nickname'),
                'email' => $form_state->getValue('email'),
                'created' => Drupal::time()->getRequestTime(),
            ])
            ->execute();

        $this->messenger()->addStatus($this->t('¡Gracias! Te has suscrito correctamente.'));
    }
}
