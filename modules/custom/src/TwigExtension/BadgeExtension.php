<?php

namespace Drupal\sg_core\TwigExtension;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

/**
 * 
 * Modulo de lógica de negocio
 * 
 */

class BadgeExtension extends AbstractExtension
{
    /**
     * Tipos de campo
     */
    private const FIELD_MAP = [
        'noticia'  => 'field_tipo_noticia',
        'producto' => 'field_tipo_productos',
    ];


    /** Variable Privada */
    private const COLOR_BADGE = [
        'Novedades'  => 'bg-success',
        'Domotica'   => 'bg-success',
        'Rebajas'    => 'bg-warning',
        'Transporte' => 'bg-info',
    ];


    public function getFilters(): array
    {
        return [
            new TwigFilter('badge_class', [$this, 'getBadgeClass']),
        ];
    }

    /**
     * Devuelve la clase relativa al tipo
     */
    public function getBadgeClass(?string $type): string
    {
        if ($type === NULL) return 'bg-secondary';

        return self::COLOR_BADGE[$type] ?? 'bg-secondary';
    }

    /**
     * 
     * Obtenemos Field
     */
    public function getFieldForBundle(string $bundle): ?string
    {
        return self::FIELD_MAP[$bundle] ?? NULL;
    }
}
