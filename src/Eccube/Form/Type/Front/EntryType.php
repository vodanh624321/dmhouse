<?php
/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) 2000-2015 LOCKON CO.,LTD. All Rights Reserved.
 *
 * http://www.lockon.co.jp/
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */


namespace Eccube\Form\Type\Front;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints as Assert;

class EntryType extends AbstractType
{
    protected $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'name', array(
                'required' => true,
            ))
            ->add('kana', 'kana', array(
                'required' => true,
            ))
            ->add('company_name', 'text', array(
                'required' => false,
                'constraints' => array(
                    new Assert\Length(array(
                        'max' => $this->config['stext_len'],
                    )),
                ),
            ))
            ->add('company_name_kana', 'text', array(
                'label' => '会社名カナ',
                'required' => false,
                'constraints' => array(
                    new Assert\Length(array(
                        'max' => $this->config['stext_len'],
                    )),
                    new Assert\Regex(array(
                        'pattern' => "/^[ァ-ヶｦ-ﾟー]+$/u",
                    )),
                ),
            ))
            ->add('full_tel', 'text', array(
                'label' => '携帯番号',
                'required' => true,
                'constraints' => array(
                    new Assert\Length(array(
                        'min' => 11,
                        'max' => 14,
                    )),
                    new Assert\Regex(array(
                        'pattern' => "/^\d+$/u",
                        'message' => 'form.type.numeric.invalid',
                    )),
                ),
            ))
            ->add('full_mobile', 'text', array(
                'label' => 'お電話番号',
                'required' => false,
                'constraints' => array(
                    new Assert\Length(array(
                        'min' => 11,
                        'max' => 14,
                    )),
                    new Assert\Regex(array(
                        'pattern' => "/^\d+$/u",
                        'message' => 'form.type.numeric.invalid',
                    )),
                ),
            ))
            ->add('zip', 'zip', array('label' => '郵便番号'))
            ->add('address', 'address')
            ->add('tel', 'tel', array(
                'required' => false,
            ))
            ->add('fax', 'tel', array(
                'required' => false,
            ))
            ->add('email', 'email', array(
                'label' => 'メールアドレス',
                'required' => true,
                'constraints' => array(
                    new Assert\NotBlank(),
                    new Assert\Email(array('strict' => true)),
                    new Assert\Regex(array(
                        'pattern' => '/^[[:graph:][:space:]]+$/i',
                        'message' => 'form.type.graph.invalid',
                    )),
                ),
            ))
            ->add('password', 'password', array(
                'label' => 'パスワード',
                'required' => true,
                'constraints' => array(
                    new Assert\NotBlank(),
                    new Assert\Length(array(
                        'min' => $this->config['password_min_len'],
                        'max' => $this->config['password_max_len'],
                    )),
                    new Assert\Regex(array(
                        'pattern' => '/^[[:graph:][:space:]]+$/i',
                        'message' => 'form.type.graph.invalid',
                    )),
                ),
            ))
            ->add('birth', 'birthday', array(
                'required' => false,
                'input' => 'datetime',
                'years' => range(date('Y'), date('Y') - $this->config['birth_max']),
                'widget' => 'choice',
                'format' => 'yyyy/MM/dd',
                'empty_value' => array('year' => '----', 'month' => '--', 'day' => '--'),
                'constraints' => array(
                    new Assert\LessThanOrEqual(array(
                        'value' => date('Y-m-d'),
                        'message' => 'form.type.select.selectisfuturedate',
                    )),
                ),
            ))
            ->add('sex', 'sex', array(
                'required' => false,
            ))
            ->add('job', 'job', array(
                'required' => false,
            ))
            ->add('save', 'submit', array('label' => 'この内容で登録する'));
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Eccube\Entity\Customer',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        // todo entry,mypageで共有されているので名前を変更する
        return 'entry';
    }
}
