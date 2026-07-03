<?php

namespace Drupal\newsletter\Form;


use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\newsletter\NewsletterSubscriberStorage;

/**
 * Fomrulario de confirmacion de eliminacion
 */
class SubscriberEditForm extends FormBase
{
    protected NewsletterSubscriberStorage $subscribers;
    protected int $id;

    public function __construct(NewsletterSubscriberStorage $subscribers)
    {
        $this->subscribers = $subscribers;
    }

    public static function create(ContainerInterface $container)
    {
        return new static($container->get('newsletter.subscriber_storage'));
    }

    /**
     * Obtener id
     */
    public function getFormId()
    {
        return 'newsletter_subscriber_edit_form';
    }



    /**
     * Recibir id de la ruta y lo guarda
     * @param array $form
     * @param FormStateInterface $form_state
     */

    public function buildForm(array $form, FormStateInterface $form_state, $id = null)
    {
        $this->id = $id;

        $user = $this->subscribers->get($this->id);

        if (!$user) return [];

        /** Campo de nicknam */
        $form['nickname'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Tu nickname'),
            '#default_value' => $user['nickname'],
            '#required' => TRUE,
        ];
        /**
         * Validando campo de correo electronico
         */
        $form['email'] = [
            '#type' => 'email',
            '#title' => $this->t('Tu correo eletronico'),
            '#default_value' => $user['email'],
            '#required' => TRUE,
        ];

        /**- Estilo Drupal */
        $form['actions']['#type'] = 'actions';

        /** Action */
        $form['actions']['submit'] = [
            '#type' => 'submit',
            '#value' => $this->t('Actalizar'),
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
        $email = $this->subscribers->exists('email', $form_state->getValue('email'), $this->id);

        if ($email) $form_state->setErrorByName('email', $this->t('Este email ya esta suscrito'));

        $nickname = $this->subscribers->exists('nickname', $form_state->getValue('nickname'), $this->id);

        if ($nickname) $form_state->setErrorByName('nickname', $this->t('Este nickname ya esta suscrito'));
    }



    /**
     * Subir datos del formularios
     * @param array $form
     * @param FormStateInterface $form_state
     */
    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        $this->subscribers->update($this->id , [
            'nickname' => $form_state->getValue('nickname'),
            'email' => $form_state->getValue('email')
        ]);

        $this->messenger()->addStatus($this->t('Se ha actualizado los datos correctamente'));
        $form_state->setRedirect('newsletter.admin');
    }
}
