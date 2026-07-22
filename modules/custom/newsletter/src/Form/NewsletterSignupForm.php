<?php

/** Carpeta del objeto */

namespace Drupal\newsletter\Form;

/** Funciones de formulario */

use Drupal\Core\Form\FormBase;

/** Conneccion a BD */

use Drupal\newsletter\NewsletterSubscriberStorage;
use Drupal\Core\Form\FormStateInterface;

/** Servicos de Base de datos */

use Symfony\Component\DependencyInjection\ContainerInterface;


/** Objeto que manega altas de usuarios */
class NewsletterSignupForm extends FormBase
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
     * Id de Fomrulario
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

        /** Nombre */
        $form['name'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Tu nombre'),
            '#required' => TRUE,
        ];

        /** Apellido */
        $form['surname'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Tu apellido'),
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
        $email = $this->subscribers->exists('email', $form_state->getValue('email'));

        if ($email) $form_state->setErrorByName('email', $this->t('Este email ya esta suscrito'));
    }



    /**
     * Subir datos del formulario
     * @param array $form
     * @param FormStateInterface $form_state
     */
    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        $this->subscribers->insert([
            'name' => $form_state->getValue('name'),
            'surname' => $form_state->getValue('surname'),
            'email' => $form_state->getValue('email'),
            'created' => \Drupal::time()->getRequestTime(),
        ]);

        $this->messenger()->addStatus($this->t('¡Gracias! Te has suscrito correctamente.'));
    }
}
