<?php

namespace OficialiaBundle\Entity;

/**
 * Formatos
 */
class Formatos
{
    /**
     * @var integer
     */
    private $idFormato;

    /**
     * @var string
     */
    private $formato;


    /**
     * Get idFormato
     *
     * @return integer
     */
    public function getIdFormato()
    {
        return $this->idFormato;
    }

    /**
     * Set formato
     *
     * @param string $formato
     *
     * @return Formatos
     */
    public function setFormato($formato)
    {
        $this->formato = $formato;

        return $this;
    }

    /**
     * Get formato
     *
     * @return string
     */
    public function getFormato()
    {
        return $this->formato;
    }
}

