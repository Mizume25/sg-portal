<?php

namespace Drupal\portal\Controller;

use Drupal\Core\Controller\ControllerBase;

class PortalController extends ControllerBase 
{
    public function content()
    {
        return [
            '#type' => 'markup',
            '#markup' => $this->t('Hola mundo Como estas'),
        ];
    }
}


?>