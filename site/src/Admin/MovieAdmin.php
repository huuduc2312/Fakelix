<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\CollectionType;
use Sonata\AdminBundle\Form\Type\ModelAutocompleteType;
use Sonata\Form\Type\DatePickerType;
use Sonata\MediaBundle\Form\Type\MediaType;
use Sonata\MediaBundle\Provider\ImageProvider;
use Symfony\Component\Cache\Adapter\AbstractAdapter;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class MovieAdmin extends AbstractAdmin
{
    protected function configureListFields(ListMapper $list)
    {
        $list->addIdentifier('name');
    }

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
            ])
            ->add('poster', MediaType::class, [
                'context' => 'default',
                'provider' => 'sonata.media.provider.image',
            ]);
    }
}
