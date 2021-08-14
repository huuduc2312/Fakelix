<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\CollectionType;
use Sonata\AdminBundle\Form\Type\ModelAutocompleteType;
use Sonata\Form\Type\DatePickerType;
use Symfony\Component\Cache\Adapter\AbstractAdapter;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class MovieAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form)
    {
        $form
            ->add('name')
            ->add('intro')
            ->add('description', TextareaType::class)
            ->add('releaseDate', DatePickerType::class)
            ->add('categories', ModelAutocompleteType::class, [
                'property' => 'name',
                'multiple' => true,
            ]);
    }
}
