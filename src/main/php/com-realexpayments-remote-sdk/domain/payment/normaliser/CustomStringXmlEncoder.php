<?php

namespace com\realexpayments\remote\sdk\domain\payment\normaliser;

use Symfony\Component\Serializer\Encoder\DecoderInterface;
use Symfony\Component\Serializer\Encoder\EncoderInterface;
use Symfony\Component\Serializer\Encoder\NormalizationAwareInterface;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Exception\UnexpectedValueException;

/**
 * Class CustomXmlEncoder
 * @package com\realexpayments\remote\sdk\domain\payment\normaliser
 *
 * Extension of the XMLEncoder that accepts an array of properties to be
 * deserialised as strings
 * @author vicpada
 */
class CustomStringXmlEncoder extends XmlEncoder implements EncoderInterface, DecoderInterface, NormalizationAwareInterface
{

    /**
     * @var \DOMDocument

      private $rootNodeName = 'response';

      /**
     * @var array fields to be serialised as strings
     */
    private $stringFields;

    /**
     * Construct new XmlEncoder and allow to change the root node element name.
     *
     * @param string $rootNodeName
     * @param array $stringFields
     */
    public function __construct($rootNodeName = 'response', array $stringFields = array())
    {
        parent::__construct($rootNodeName);
        $this->stringFields = $stringFields;
    }

    /**
     * @param string $nodeName name of the node
     *
     * @return bool
     */
    private function isStringField($nodeName)
    {
        return in_array($nodeName, $this->stringFields);
    }

}
