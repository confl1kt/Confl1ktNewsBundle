<?php
namespace Confl1kt\NewsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CommentType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, [
                'label' => 'form.comment.name'
            ])
            ->add('email', 'email', [
                'required' => false,
                'label' => 'form.comment.email'
            ])
            ->add('url', 'url', [
                'required' => false,
                'label' => 'form.comment.url'
            ])
            ->add('message', null, [
                'label' => 'form.comment.message'
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'sonata_post_comment';
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        ;
        $resolver->setDefaults([
            'translation_domain' => 'NewsBundle',
        ]);
    }
}
