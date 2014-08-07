<?php

namespace Rebeca\TaskBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TaskType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('user')
            ->add('createdAt','date',array(
						            'widget' => 'single_text',
						            'format' => 'dd-MM-yyyy',
						            'attr' => array('class' => 'date')
        							))
            ->add('updatedAt','date',array(
						            'widget' => 'single_text',
						            'format' => 'dd-MM-yyyy',
						            'attr' => array('class' => 'date')
        							))
            ->add('finishedAt','date',array(
						            'widget' => 'single_text',
						            'format' => 'dd-MM-yyyy',
						            'attr' => array('class' => 'date')
        							))
            ->add('status')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Rebeca\TaskBundle\Entity\Task'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'rebeca_taskbundle_task';
    }
}
