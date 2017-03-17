<?php

namespace Blog\Validators;

use Plenty\Validation\Validator;

/**
 * Class BlogValidator
 * @package Blog\Validators
 */
class BlogValidator extends Validator
{
    protected function defineAttributes()
    {
        $this->addString('authorName', true);
        $this->addString('title', true);
        $this->addString('titleUrl', true);
        $this->addString('previewText', false);
        $this->addString('text', true);
        $this->addString('imageUrl', true);
        $this->addBool('isActive', false);
    }
}