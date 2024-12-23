<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Advanced_Icon_Box_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'advanced_icon_box';
    }

    public function get_title()
    {
        return esc_html__('Advanced Icon Box', 'ad_icon_box');
    }

    public function get_icon()
    {
        return 'eicon-icon-box';
    }

    public function get_categories()
    {
        return ['basic'];
    }

//    public function get_keywords() {
//        return [ 'hello', 'world' ];
//    }

//register_controls
    protected function register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'ad_icon_box'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Title', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Icon Box Title', 'ad_icon_box'),
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __('Description', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Add your description here.', 'ad_icon_box'),
            ]
        );
        $this->add_control(
            'title_tag',
            [
                'label' => __('Title HTML Tag', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'h3',
                'options' => [
                    'h1' => __('H1', 'ad_icon_box'),
                    'h2' => __('H2', 'ad_icon_box'),
                    'h3' => __('H3', 'ad_icon_box'),
                    'h4' => __('H4', 'ad_icon_box'),
                    'h5' => __('H5', 'ad_icon_box'),
                    'h6' => __('H6', 'ad_icon_box'),
                    'p' => __('Paragraph', 'ad_icon_box'),
                    'span' => __('Span', 'ad_icon_box'),
                ],
            ]
        );

        // button
        $this->add_control(
            'show_button',
            [
                'label' => __('Show Button', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'ad_icon_box'),
                'label_off' => __('Hide', 'ad_icon_box'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => __('Button Text', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Click Me', 'ad_icon_box'),
                'condition' => [
                    'show_button' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'button_icon',
            [
                'label' => __('Button Icon', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'description' => __('Choose an icon to display with the button.', 'ad_icon_box'),
                'condition' => [
                    'show_button' => 'yes',
                ],
            ]
        );


        $this->add_control(
            'icon_alignment',
            [
                'label' => __('Icon Alignment', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'left' => __('Left', 'ad_icon_box'),
                    'right' => __('Right', 'ad_icon_box'),
                    'top' => __('Top', 'ad_icon_box'),
                    'bottom' => __('Bottom', 'ad_icon_box'),
                ],
                'default' => 'left',
                'condition' => [
                    'show_button' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'button_url',
            [
                'label' => __('Button URL', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false,
                ],
                'condition' => [
                    'show_button' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'button_alignment',
            [
                'label' => __('Button Alignment', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'ad_icon_box'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'ad_icon_box'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'ad_icon_box'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'left',
                'toggle' => true,
                'condition' => [
                    'show_button' => 'yes',
                ],
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            'icon_section',
            [
                'label' => __('Icon Options', 'ad_icon_box'),
            ]
        );

        $this->add_control(
            'icon_type',
            [
                'label' => __('Choose Icon Type', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'none' => [
                        'title' => __('None', 'ad_icon_box'),
                        'icon' => 'eicon-ban',
                    ],
                    'icon' => [
                        'title' => __('Icon', 'ad_icon_box'),
                        'icon' => 'eicon-star',
                    ],
                    'image' => [
                        'title' => __('Image', 'ad_icon_box'),
                        'icon' => 'eicon-image-bold',
                    ],
                ],
                'default' => 'icon',
                'toggle' => true, // Allows toggling between options
            ]
        );

        $this->add_control(
            'icon',
            [
                'label' => __('Icon', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'condition' => [
                    'icon_type' => 'icon',
                ],
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
            ]
        );

        $this->add_control(
            'icon_image',
            [
                'label' => __('Image', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'condition' => [
                    'icon_type' => 'image',
                ],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'icon_position',
            [
                'label' => __('Icon Position', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'top',
                'options' => [
                    'top' => __('Top', 'ad_icon_box'),
                    'left' => __('Left', 'ad_icon_box'),
                    'right' => __('Right', 'ad_icon_box'),
                ],
            ]
        );


        $this->end_controls_section();


        /******************************************************************** Style *************************************************************************************************/

        /****************************************** Container Box Style ****************************************************/

        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__('Container Box', 'ad_icon_box'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Tabs: Normal and Hover
        $this->start_controls_tabs('style_tabs');

        // Normal Tab
        $this->start_controls_tab(
            'style_normal_tab',
            [
                'label' => __('Normal', 'ad_icon_box'),
            ]
        );

        // Background control
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .advance_icon_box',
            ]
        );
        // Padding control
        $this->add_responsive_control(
            'padding',
            [
                'label' => __('Padding', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'default' => ['top' => '50', 'right' => '40', 'bottom' => '50', 'left' => '40', 'unit' => 'px',],
                'selectors' => [
                    '{{WRAPPER}} .advance_icon_box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Margin control
//        $this->add_responsive_control(
//            'margin',
//            [
//                'label' => __('Margin', 'ad_icon_box'),
//                'type' => \Elementor\Controls_Manager::DIMENSIONS,
//                'size_units' => ['px', '%', 'em'],
//                'selectors' => [
//                    '{{WRAPPER}} .advance_icon_box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
//                ],
//            ]
//        );


        // Border control
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'selector' => '{{WRAPPER}} .advance_icon_box',
                'fields_options' => [
                    'border' => [
                        'default' => 'solid',
                    ],
                    'width' => [
                        'default' => [
                            'top' => '1',
                            'right' => '1',
                            'bottom' => '1',
                            'left' => '1',
                            'isLinked' => true,
                        ],
                    ],
                    'color' => [
                        'default' => '#f5f5f5',
                    ],
                ],
            ]
        );

        // Border radius control
        $this->add_responsive_control(
            'border_radius',
            [
                'label' => __('Border Radius', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'default' => [
                    'top' => 5,
                    'right' => 5,
                    'bottom' => 5,
                    'left' => 5,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .advance_icon_box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // BoxShadow control
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'selector' => '{{WRAPPER}} .advance_icon_box',
            ]
        );

        $this->end_controls_tab();


        // Hover Tab
        $this->start_controls_tab(
            'style_hover_tab_container',
            [
                'label' => __('Hover', 'ad_icon_box'),
            ]
        );

        // Background (Hover)
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background_hover_container',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .advance_icon_box:hover',
            ]
        );

        // Padding (Hover)
        $this->add_responsive_control(
            'padding_hover_container',
            [
                'label' => __('Padding', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .advance_icon_box:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Margin (Hover)
//        $this->add_responsive_control(
//            'margin_hover_container',
//            [
//                'label' => __('Margin', 'ad_icon_box'),
//                'type' => \Elementor\Controls_Manager::DIMENSIONS,
//                'size_units' => ['px', '%', 'em'],
//                'selectors' => [
//                    '{{WRAPPER}} .advance_icon_box:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
//                ],
//            ]
//        );

        // Border control
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'border_hover_container',
                'selector' => '{{WRAPPER}} .advance_icon_box:hover',
            ]
        );

        // Border Radius (Hover)
        $this->add_responsive_control(
            'border_radius_hover_container',
            [
                'label' => __('Border Radius', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .advance_icon_box:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        // BoxShadow control
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'container_box_shadow_hover',
                'selector' => '{{WRAPPER}} .advance_icon_box:hover',
            ]
        );

        $this->add_control(
            'hover_animation',
            [
                'label' => __('Hover Animation', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::HOVER_ANIMATION,
                'selector' => '{{WRAPPER}} .advance_icon_box_hover_animation',
            ]
        );


        // Hover Controls Here
        $this->end_controls_tab();

        $this->end_controls_tabs();

//        container_alignment
        $this->add_control(
            'container_alignment_top',
            [
                'label' => __('Alignment', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'ad_icon_box'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'ad_icon_box'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'ad_icon_box'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'condition' => [
                    'icon_position' => 'top',
                ],
                'selectors' => [
                    '{{WRAPPER}} .advance_icon_box' => 'text-align: {{VALUE}};',
                ],

            ]
        );

        $this->add_control(
            'container_alignment_left_right',
            [
                'label' => __('Alignment', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'ad_icon_box'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'ad_icon_box'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'ad_icon_box'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'condition' => [
                    'icon_position!' => 'top',
                ],
                'selectors' => [
                    '{{WRAPPER}} .advance_icon_box' => 'justify-content: {{VALUE}};',
                ],

            ]
        );

        $this->add_control(
            'vertical_alignment',
            [
                'label' => __('Vertical Alignment', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'start' => [
                        'title' => __('Top', 'ad_icon_box'),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'center' => [
                        'title' => __('Middle', 'ad_icon_box'),
                        'icon' => 'eicon-v-align-middle',
                    ],
                    'end' => [
                        'title' => __('Bottom', 'ad_icon_box'),
                        'icon' => 'eicon-v-align-bottom',
                    ],
                ],
                'condition' => [
                    'icon_position!' => 'top',
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .advance_icon_box' => 'align-items: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();


        /******************************************************************** Button Style Control *************************************************************************************/

        // Start New Section
        $this->start_controls_section(
            'button_icon_style_section',
            [
                'label' => __('Button Icon Style', 'ad_icon_box'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_button' => 'yes', // Only show this section if the button is visible
                ],
            ]
        );

        // Button Icon Size Control
        $this->add_control(
            'button_icon_size',
            [
                'label' => __('Button Icon Size', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'range' => [
                    'px' => [
                        'min' => 5,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 20,
                ],
                'selectors' => [
                    '{{WRAPPER}} .button-icon svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};', // Apply size to both width and height
                ],
            ]
        );

        // Add Padding Control
        $this->add_responsive_control(
            'button_icon_padding',
            [
                'label' => __('Icon Padding', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'default' => [
                    'top' => 8,
                    'right' => 32,
                    'bottom' => 8,
                    'left' => 32,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .button-wrapper .advance-icon-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        // Button Display Control
        $this->add_control(
            'button_display',
            [
                'label' => esc_html__('Button Display', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'inline-block',
                'options' => [
                    'block' => esc_html__('Block', 'ad_icon_box'),
                    'inline' => esc_html__('Inline', 'ad_icon_box'),
                    'inline-block' => esc_html__('Inline-Block', 'ad_icon_box'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .button-wrapper' => 'display: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'button_text_typography',
                'label' => __('Typography', 'ad_icon_box'),
                'selector' => '{{WRAPPER}} .button-text',
            ]
        );


        // Add Icon Color Control with Tabs
        $this->start_controls_tabs('button_icon_colors_tabs');

        // Normal Tab
        $this->start_controls_tab(
            'button_normal_tab',
            [
                'label' => __('Normal', 'ad_icon_box'),
            ]
        );
        $this->add_control(
            'button_background_color',
            [
                'label' => __('Button Background Color', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#007BFF',
                'selectors' => [
                    '{{WRAPPER}} .button-wrapper .advance-icon-button' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'button_text_color',
            [
                'label' => __('Button Text Color', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .button-text' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_icon_color',
            [
                'label' => __('Icon Color', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .button-icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'selector' => '{{WRAPPER}} .button-wrapper .advance-icon-button',
            ]
        );

        $this->add_responsive_control(
            'button_border_radius',
            [
                'label' => __('Border Radius', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'default' => [
                    'top' => 5,
                    'right' => 5,
                    'bottom' => 5,
                    'left' => 5,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .button-wrapper .advance-icon-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow',
                'selector' => '{{WRAPPER}} .button-wrapper .advance-icon-button',
            ]
        );

        $this->end_controls_tab();

        // Hover Tab
        $this->start_controls_tab(
            'button_hover_tab',
            [
                'label' => __('Hover', 'ad_icon_box'),
            ]
        );
        $this->add_control(
            'button_background_color_hover',
            [
                'label' => __('Button Background Color', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .advance_icon_box:hover .button-wrapper .advance-icon-button' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'button_text_hover_color',
            [
                'label' => __('Button Text Hover Color', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advance_icon_box:hover .button-text' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'button_icon_hover_color',
            [
                'label' => __('Icon Hover Color', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advance_icon_box:hover .button-icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'button_border_hover',
                'selector' => '{{WRAPPER}} .advance_icon_box:hover .button-wrapper .advance-icon-button',
            ]
        );

        $this->add_responsive_control(
            'button_border_radius_hover',
            [
                'label' => __('Border Radius', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .advance_icon_box:hover .button-wrapper .advance-icon-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow_hover',
                'selector' => '{{WRAPPER}} .advance_icon_box:hover .button-wrapper .advance-icon-button',
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();


        $this->end_controls_section();

        /************************************************ Content Style ***********************************************************************/

        $this->start_controls_section(
            'style_section_content_title',
            [
                'label' => __('Content Style', 'ad_icon_box'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        // Title Controls
        $this->add_control(
            'content_title_heading',
            [
                'label' => __('Title', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::HEADING,
            ]
        );

        $this->start_controls_tabs('title_color_tabs');

        // Normal Tab
        $this->start_controls_tab(
            'content_title_normal_tab',
            [
                'label' => __('Normal', 'ad_icon_box'),
            ]
        );

        $this->add_control(
            'content_title_color',
            [
                'label' => __('Color', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advance_icon_box_title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

// Hover Tab
        $this->start_controls_tab(
            'content_title_hover_tab',
            [
                'label' => __('Hover', 'ad_icon_box'),
            ]
        );

        $this->add_control(
            'content_title_hover_color',
            [
                'label' => __('Hover Color', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advance_icon_box:hover .advance_icon_box_title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'content_title_typography',
                'label' => __('Typography', 'ad_icon_box'),
                'selector' => '{{WRAPPER}} .advance_icon_box_title',
            ]
        );
//        $this->add_control(
//            'content_title_alignment',
//            [
//                'label' => __('Alignment', 'ad_icon_box'),
//                'type' => \Elementor\Controls_Manager::CHOOSE,
//                'options' => [
//                    'left' => [
//                        'title' => __('Left', 'ad_icon_box'),
//                        'icon' => 'eicon-text-align-left',
//                    ],
//                    'center' => [
//                        'title' => __('Center', 'ad_icon_box'),
//                        'icon' => 'eicon-text-align-center',
//                    ],
//                    'right' => [
//                        'title' => __('Right', 'ad_icon_box'),
//                        'icon' => 'eicon-text-align-right',
//                    ],
//                ],
//                'selectors' => [
//                    '{{WRAPPER}} .advance_icon_box_title' => 'text-align: {{VALUE}};',
//                ],
//            ]
//        );

        // Description Controls
        $this->add_control(
            'content_description_heading',
            [
                'label' => __('Description', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::HEADING,
            ]
        );

        $this->start_controls_tabs('description_color_tabs');

        // Icon Box Normal Tab
        $this->start_controls_tab(
            'content_description_normal_tab',
            [
                'label' => __('Normal', 'ad_icon_box'),
            ]
        );

        $this->add_control(
            'content_description_color',
            [
                'label' => __('Color', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advance_icon_box_description' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        // Icon Box Hover Tab
        $this->start_controls_tab(
            'content_description_hover_tab',
            [
                'label' => __('Hover', 'ad_icon_box'),
            ]
        );

        $this->add_control(
            'content_description_hover_color',
            [
                'label' => __('Hover Color', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advance_icon_box:hover .advance_icon_box_description ' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();


        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => __('Typography', 'ad_icon_box'),
                'selector' => '{{WRAPPER}} .advance_icon_box_description',
            ]
        );

//        $this->add_control(
//            'description_alignment',
//            [
//                'label' => __('Alignment', 'ad_icon_box'),
//                'type' => \Elementor\Controls_Manager::CHOOSE,
//                'options' => [
//                    'left' => [
//                        'title' => __('Left', 'ad_icon_box'),
//                        'icon' => 'eicon-text-align-left',
//                    ],
//                    'center' => [
//                        'title' => __('Center', 'ad_icon_box'),
//                        'icon' => 'eicon-text-align-center',
//                    ],
//                    'right' => [
//                        'title' => __('Right', 'ad_icon_box'),
//                        'icon' => 'eicon-text-align-right',
//                    ],
//                ],
//                'selectors' => [
//                    '{{WRAPPER}} .advance_icon_box_description' => 'text-align: {{VALUE}};',
//                ],
//            ]
//        );


        $this->end_controls_section();

        /**************************************************************************************** Icon Style **************************************************************************************************/

        $this->start_controls_section(
            'style_section_media',
            [
                'label' => esc_html__('Icon Style', 'ad_icon_box'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'icon_type!' => 'none', // Show only if 'icon_type' is not 'none'
                ]
            ]
        );
        $this->start_controls_tabs('icon_box_tabs');

        // Normal Tab
        $this->start_controls_tab(
            'icon_box_normal_tab',
            [
                'label' => __('Normal', 'ad_icon_box'),
            ]
        );
        $this->add_control(
            'icon_size_media',
            [
                'label' => __('Icon Size', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 200,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                    'em' => [
                        'min' => 1,
                        'max' => 10,
                        'step' => 0.1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .advance_icon_box_media i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .advance_icon_box_media svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};', // For SVG icons
                    '{{WRAPPER}} .advance_icon_box_media img' => 'width: {{SIZE}}{{UNIT}};', // For image icons
                ],
            ]
        );

//        $this->add_control(
//            'box_icon_alignment',
//            [
//                'label' => __('Icon Alignment', 'ad_icon_box'),
//                'type' => \Elementor\Controls_Manager::CHOOSE,
//                'options' => [
//                    'left' => [
//                        'title' => __('Left', 'ad_icon_box'),
//                        'icon' => 'eicon-text-align-left',
//                    ],
//                    'center' => [
//                        'title' => __('Center', 'ad_icon_box'),
//                        'icon' => 'eicon-text-align-center',
//                    ],
//                    'right' => [
//                        'title' => __('Right', 'ad_icon_box'),
//                        'icon' => 'eicon-text-align-right',
//                    ],
//                ],
//                'toggle' => true,
//                'selectors' => [
//                    '{{WRAPPER}} .advance_icon_box_media' => 'text-align: {{VALUE}};',
//                ],
//            ]
//        );

        // Padding control
        $this->add_responsive_control(
            'box_icon_padding',
            [
                'label' => __('Padding', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .advance_icon_box_media' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Margin control
        $this->add_responsive_control(
            'box_icon_margin',
            [
                'label' => __('Margin', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .advance_icon_box_media' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


//        Icon Type Icon

        //  Background Color
        $this->add_control(
            'box_icon_background_color',
            [
                'label' => __('Icon Background Color', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advance_icon_box_media i' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .advance_icon_box_media svg' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'icon_type' => 'icon',
                ],
            ]
        );

        //  color
        $this->add_control(
            'box_icon_color',
            [
                'label' => __('Icon Color', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advance_icon_box_media i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .advance_icon_box_media svg' => 'fill: {{VALUE}};',
                ],
                'condition' => [
                    'icon_type' => 'icon',
                ],
            ]
        );


        $this->add_control(
            'box_icon_spacing',
            [
                'label' => __('Icon Spacing', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 10,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .advance_icon_box_media i' => 'padding: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .advance_icon_box_media svg' => 'padding: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'icon_type' => 'icon',
                ],
            ]
        );


        // Border control
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'icon_box_icon_border',
                'label' => __('Icon Border', 'ad_icon_box'),
                'selector' => '{{WRAPPER}} .advance_icon_box_media i',
                'condition' => [
                    'icon_type' => 'icon',
                ],
            ]
        );

        // Border radius control
        $this->add_responsive_control(
            'icon_box_icon_border_radius',
            [
                'label' => __('Icon Border Radius', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .advance_icon_box_media i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'icon_type' => 'icon',
                ],
            ]
        );

        // BoxShadow control
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_icon_box_shadow',
                'label' => __('Icon Shadow', 'ad_icon_box'),
                'selector' => '{{WRAPPER}} .advance_icon_box_media i, {{WRAPPER}} .advance_icon_box_media svg',
                'condition' => [
                    'icon_type' => 'icon',
                ],
            ]
        );


        $this->end_controls_tab();

        // Hover Tab
        $this->start_controls_tab(
            'icon_box_hover_tab',
            [
                'label' => __('Hover', 'ad_icon_box'),
            ]
        );
        $this->add_control(
            'icon_size_hover_media',
            [
                'label' => __('Icon Size', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 200,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                    'em' => [
                        'min' => 1,
                        'max' => 10,
                        'step' => 0.1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .advance_icon_box:hover .advance_icon_box_media i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .advance_icon_box:hover .advance_icon_box_media svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};', // For SVG icons
                    '{{WRAPPER}} .advance_icon_box:hover .advance_icon_box_media img' => 'width: {{SIZE}}{{UNIT}};', // For image icons
                ],
            ]
        );

//        $this->add_control(
//            'box_icon_hover_alignment',
//            [
//                'label' => __('Icon Alignment', 'ad_icon_box'),
//                'type' => \Elementor\Controls_Manager::CHOOSE,
//                'options' => [
//                    'left' => [
//                        'title' => __('Left', 'ad_icon_box'),
//                        'icon' => 'eicon-text-align-left',
//                    ],
//                    'center' => [
//                        'title' => __('Center', 'ad_icon_box'),
//                        'icon' => 'eicon-text-align-center',
//                    ],
//                    'right' => [
//                        'title' => __('Right', 'ad_icon_box'),
//                        'icon' => 'eicon-text-align-right',
//                    ],
//                ],
//                'toggle' => true,
//                'selectors' => [
//                    '{{WRAPPER}} .advance_icon_box:hover .advance_icon_box_media' => 'text-align: {{VALUE}};',
//                ],
//            ]
//        );

        // Padding control
        $this->add_responsive_control(
            'box_icon_hover_padding',
            [
                'label' => __('Padding', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .advance_icon_box:hover .advance_icon_box_media' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Margin control
        $this->add_responsive_control(
            'box_icon_hover_margin',
            [
                'label' => __('Margin', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .advance_icon_box:hover .advance_icon_box_media' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        //  Icon Type Icon

        //  Background Color
        $this->add_control(
            'box_icon_hover_background_color',
            [
                'label' => __('Icon Background Color', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advance_icon_box:hover .advance_icon_box_media i' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .advance_icon_box:hover .advance_icon_box_media svg' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'icon_type' => 'icon',
                ],
            ]
        );

        //  color
        $this->add_control(
            'box_icon_hover_color',
            [
                'label' => __('Icon Color', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advance_icon_box:hover .advance_icon_box_media i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .advance_icon_box:hover .advance_icon_box_media svg' => 'fill: {{VALUE}};',
                ],
                'condition' => [
                    'icon_type' => 'icon',
                ],
            ]
        );


        $this->add_control(
            'box_icon_hover_spacing',
            [
                'label' => __('Icon Spacing', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 10,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .advance_icon_box:hover .advance_icon_box_media i' => 'padding: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .advance_icon_box:hover .advance_icon_box_media svg' => 'padding: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'icon_type' => 'icon',
                ],
            ]
        );


        // Border control
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'icon_box_hover_icon_border',
                'label' => __('Icon Border', 'ad_icon_box'),
                'selector' => '{{WRAPPER}} .advance_icon_box:hover .advance_icon_box_media i',
                'condition' => [
                    'icon_type' => 'icon',
                ],
            ]
        );

        // Border radius control
        $this->add_responsive_control(
            'icon_box_icon_hover_border_radius',
            [
                'label' => __('Icon Border Radius', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .advance_icon_box:hover .advance_icon_box_media i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'icon_type' => 'icon',
                ],
            ]
        );

        // BoxShadow control
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_icon_hover_box_shadow',
                'label' => __('Icon Shadow', 'ad_icon_box'),
                'selector' => '{{WRAPPER}} .advance_icon_box:hover .advance_icon_box_media i, {{WRAPPER}} .advance_icon_box:hover .advance_icon_box_media svg',
                'condition' => [
                    'icon_type' => 'icon',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();


        // Border control
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'box_icon_border',
                'selector' => '{{WRAPPER}} .advance_icon_box_media img',
                'condition' => [
                    'icon_type' => 'image',
                ],
            ]
        );

        // Border radius control
        $this->add_responsive_control(
            'box_icon_border_radius',
            [
                'label' => __('Border Radius', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .advance_icon_box_media img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'icon_type' => 'image',
                ],
            ]
        );

        // BoxShadow control
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_icon_shadow',
                'selector' => '{{WRAPPER}} .advance_icon_box_media img',
                'condition' => [
                    'icon_type' => 'image',
                ],
            ]
        );


        $this->end_controls_section();

        /********************************************************************************************* Container Link *********************************************************************/

        $this->start_controls_section(
            'content_section_link',
            [
                'label' => esc_html__('Container Wrapper Link', 'ad_icon_box'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'container_link',
            [
                'label' => __('Link', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'ad_icon_box'),
                'show_external' => true,
                'default' => [
                    'url' => '',
                ],
            ]
        );


        $this->end_controls_section();

        /************************************************************************************* Badge Section ******************************************************************************************************/
        $this->start_controls_section(
            'badge_section',
            [
                'label' => __('Badge', 'ad_icon_box'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'show_badge',
            [
                'label' => __('Show Badge', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'ad_icon_box'),
                'label_off' => __('No', 'ad_icon_box'),
                'default' => 'no',
            ]
        );

        $this->add_control(
            'badge_title',
            [
                'label' => __('Badge Title', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Badge', 'ad_icon_box'),
                'condition' => [
                    'show_badge' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'badge_position',
            [
                'label' => __('Badge Position', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'top_center',
                'options' => [
                    'top_left' => __('Top Left', 'ad_icon_box'),
                    'top_center' => __('Top Center', 'ad_icon_box'),
                    'top_right' => __('Top Right', 'ad_icon_box'),
                    'center_left' => __('Center Left', 'ad_icon_box'),
                    'center_right' => __('Center Right', 'ad_icon_box'),
                    'bottom_left' => __('Bottom Left', 'ad_icon_box'),
                    'bottom_center' => __('Bottom Center', 'ad_icon_box'),
                    'bottom_right' => __('Bottom Right', 'ad_icon_box'),
                    'custom' => __('Custom', 'ad_icon_box'),
                ],
                'condition' => [
                    'show_badge' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'custom_top',
            [
                'label' => __('Custom Top Position', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => -500,
                        'max' => 500,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 0,
                ],
                'condition' => [
                    'show_badge' => 'yes',
                    'badge_position' => 'custom',
                ],
            ]
        );

        $this->add_control(
            'custom_left',
            [
                'label' => __('Custom Left Position', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => -500,
                        'max' => 500,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 0,
                ],
                'condition' => [
                    'show_badge' => 'yes',
                    'badge_position' => 'custom',
                ],
            ]
        );

        $this->end_controls_section();


        /******************************************************************** Badge Style Control *************************************************************************************/

        $this->start_controls_section(
            'badge_style_section',
            [
                'label' => __('Badge Style', 'ad_icon_box'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_badge' => 'yes',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'badge_typography',
                'label' => __('Typography', 'ad_icon_box'),
                'selector' => '{{WRAPPER}} .badge',
            ]
        );

        $this->add_responsive_control(
            'badge_padding',
            [
                'label' => __('Badge Padding', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'default' => [
                    'top' => 5,
                    'right' => 10,
                    'bottom' => 5,
                    'left' => 10,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .badge' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs('badge_style_tabs');

        $this->start_controls_tab(
            'badge_normal_tab',
            [
                'label' => __('Normal', 'ad_icon_box'),
            ]
        );
        $this->add_control(
            'badge_background_color',
            [
                'label' => __('Background Color', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ff0000',
                'selectors' => [
                    '{{WRAPPER}} .badge' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'badge_text_color',
            [
                'label' => __('Text Color', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .badge' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'badge_border',
                'selector' => '{{WRAPPER}} .badge',
            ]
        );

        $this->add_responsive_control(
            'badge_border_radius',
            [
                'label' => __('Border Radius', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'default' => [
                    'top' => 5,
                    'right' => 5,
                    'bottom' => 5,
                    'left' => 5,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .badge' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'badge_box_shadow',
                'selector' => '{{WRAPPER}} .badge',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'badge_hover_tab',
            [
                'label' => __('Hover', 'ad_icon_box'),
            ]
        );
        $this->add_control(
            'badge_background_color_hover',
            [
                'label' => __('Background Color', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advance_icon_box:hover .badge' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'badge_text_hover_color',
            [
                'label' => __('Text Color', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advance_icon_box:hover .badge' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'badge_border_hover',
                'selector' => '{{WRAPPER}} .advance_icon_box:hover .badge',
            ]
        );

        $this->add_responsive_control(
            'badge_border_radius_hover',
            [
                'label' => __('Border Radius', 'ad_icon_box'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .advance_icon_box:hover .badge' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'badge_box_shadow_hover',
                'selector' => '{{WRAPPER}} .advance_icon_box:hover .badge',
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();


        $this->end_controls_section();


    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();

        // Add the static class
        $this->add_render_attribute(
            'advance_icon_box_hover_animation',
            'class',
            'advance_icon_box'
        );

        $this->add_render_attribute('advance_icon_box_hover_animation', 'class', 'icon-position-' . $settings['icon_position']);

        // Add the hover animation class if set
        if (!empty($settings['hover_animation'])) {
            $this->add_render_attribute(
                'advance_icon_box_hover_animation',
                'class',
                'elementor-animation-' . $settings['hover_animation']
            );
        }

        // Add inline editing attributes while preserving existing classes
        $this->add_render_attribute('title', 'class', 'advance_icon_box_title');
        $this->add_inline_editing_attributes('title', 'none');

        $this->add_render_attribute('description', 'class', 'advance_icon_box_description');
        $this->add_inline_editing_attributes('description', 'basic');

        // Get the selected tag or fallback to 'h3'
        $tag = !empty($settings['title_tag']) ? $settings['title_tag'] : 'h3';

//      Container link
        $container_link = !empty($settings['container_link']['url']) ? $settings['container_link']['url'] : '';
        if ($container_link) {
            echo '<a href="' . esc_url($container_link) . '" class="advance_icon_box_link">';
        }

        ?>
        <div <?php echo $this->get_render_attribute_string('advance_icon_box_hover_animation'); ?> >
            <div class="advance_icon_box_media">
                <?php
                if ('icon' === $settings['icon_type'] && !empty($settings['icon']['value'])) {
                    \Elementor\Icons_Manager::render_icon($settings['icon'], ['aria-hidden' => 'true']);
                } elseif ('image' === $settings['icon_type']) {
                    $image_url = !empty($settings['icon_image']['url'])
                        ? $settings['icon_image']['url']
                        : \Elementor\Utils::get_placeholder_image_src();

                    echo '<img src="' . esc_url($image_url) . '" alt="' . esc_attr__('Icon Image', 'ad_icon_box') . '">';
                }
                ?>
            </div>
            <div class="advance_icon_box_content">
                <?php
                echo sprintf(
//                    '<%1$s class="advance_icon_box_title">%2$s</%1$s>',
                    '<%1$s %2$s>%3$s</%1$s>',
                    esc_html($tag), // Escaping the tag
                    $this->get_render_attribute_string('title'),
                    esc_html($settings['title']) // Escaping the title content
                );
                ?>
                <p <?php echo $this->get_render_attribute_string('description'); ?>><?php echo $settings['description']; ?></p>
                <?php
                if ('yes' === $settings['show_button']) {
                    $button_text = !empty($settings['button_text']) ? $settings['button_text'] : __('Click Me', 'ad_icon_box');
                    $button_url = !empty($settings['button_url']['url']) ? $settings['button_url']['url'] : '#';
                    $icon_html = '';
                    $icon_position = $settings['icon_alignment'];
                    $button_alignment = !empty($settings['button_alignment']) ? $settings['button_alignment'] : 'left';

                    // Generate Icon HTML
                    if (!empty($settings['button_icon']['value'])) {
                        ob_start();
                        \Elementor\Icons_Manager::render_icon($settings['button_icon'], ['aria-hidden' => 'true']);
                        $icon_html = ob_get_clean();
                    }

                    // Generate Button HTML with Alignment Wrapper
                    echo '<div class="button-wrapper" style="text-align: ' . esc_attr($button_alignment) . ';">';
                    echo '<a href="' . esc_url($button_url) . '" class="advance-icon-button">';

                    // Handle Icon Position
                    if ('top' === $icon_position && $icon_html) {
                        echo '<div class="button-icon button-icon-top">' . $icon_html . '</div>';
                    }

                    if ('left' === $icon_position && $icon_html) {
                        echo '<span class="button-icon button-icon-left">' . $icon_html . '</span>';
                    }

                    echo '<span class="button-text">' . esc_html($button_text) . '</span>';

                    if ('right' === $icon_position && $icon_html) {
                        echo '<span class="button-icon button-icon-right">' . $icon_html . '</span>';
                    }

                    if ('bottom' === $icon_position && $icon_html) {
                        echo '<div class="button-icon button-icon-bottom">' . $icon_html . '</div>';
                    }

                    echo '</a>';
                    echo '</div>';
                }
                ?>
            </div>
            <?php
            // Badge condition
            if (!empty($settings['show_badge']) && $settings['show_badge'] === 'yes') {
                $badge_title = esc_html($settings['badge_title']);
                $badge_position = esc_attr($settings['badge_position']);

                // Add custom inline styles for 'custom' position
                $custom_styles = '';

                if ($badge_position === 'custom') {
                    $custom_top = !empty($settings['custom_top']['size']) ? $settings['custom_top']['size'] . $settings['custom_top']['unit'] : '0px';
                    $custom_left = !empty($settings['custom_left']['size']) ? $settings['custom_left']['size'] . $settings['custom_left']['unit'] : '0px';

                    $custom_styles = "style='top: {$custom_top}; left: {$custom_left};'";
                }

                echo "<div class='badge badge-{$badge_position}' {$custom_styles}>{$badge_title}</div>";
            }
            ?>
        </div>

        <?php
        // Close the link tag if it was opened
        if ($container_link) {
            echo '</a>';
        }

    }


    protected function content_template() {
        ?>
        <#
        var settings = settings || {};

        // Add classes for the hover animation and icon position
        var hoverAnimationClass = settings.hover_animation ? 'elementor-animation-' + settings.hover_animation : '';
        var iconPositionClass = 'icon-position-' + settings.icon_position;
        var containerClass = 'advance_icon_box ' + hoverAnimationClass + ' ' + iconPositionClass;

        // Add inline editing attributes and preserve existing classes
        view.addRenderAttribute('title', 'class', 'advance_icon_box_title');
        view.addInlineEditingAttributes('title', 'none');

        view.addRenderAttribute('description', 'class', 'advance_icon_box_description');
        view.addInlineEditingAttributes('description', 'basic');

        // Container link
        var containerLink = settings.container_link && settings.container_link.url ? settings.container_link.url : '';

        // Badge custom styles
        var badgeStyles = '';
        if (settings.badge_position === 'custom') {
        var customTop = settings.custom_top ? settings.custom_top.size + (settings.custom_top.unit || 'px') : '0px';
        var customLeft = settings.custom_left ? settings.custom_left.size + (settings.custom_left.unit || 'px') : '0px';
        badgeStyles = 'style="top:' + customTop + '; left:' + customLeft + ';"';
        }
        #>

        <# if (containerLink) { #>
        <a href="{{ containerLink }}" class="advance_icon_box_link">
            <# } #>

            <div class="{{ containerClass }}">
                <div class="advance_icon_box_media">
                    <#
                    if (settings.icon_type === 'icon' && settings.icon.value) {
                    var iconHTML = elementor.helpers.renderIcon(view, settings.icon, { 'aria-hidden': true }, 'i', 'object');
                    if (iconHTML.rendered) {
                    print(iconHTML.value);
                    }
                    } else if (settings.icon_type === 'image') {
                    var imageUrl = settings.icon_image && settings.icon_image.url ? settings.icon_image.url : Elementor.utils.getPlaceholderImageSrc();
                    #>
                    <img src="{{ imageUrl }}" alt="{{ settings.icon_image_alt || '<?php esc_attr_e('Icon Image', 'ad_icon_box'); ?>' }}">
                    <# } #>
                </div>
                <div class="advance_icon_box_content">
                    <#
                    var tag = settings.title_tag || 'h3';
                    #>
                    <{{ tag }} {{{ view.getRenderAttributeString('title') }}}>{{{ settings.title }}}</{{ tag }}>
                <p {{{ view.getRenderAttributeString('description') }}}>{{{ settings.description }}}</p>

                <# if (settings.show_button === 'yes') {
                var buttonText = settings.button_text || '<?php esc_html_e('Click Me', 'ad_icon_box'); ?>';
                var buttonUrl = settings.button_url && settings.button_url.url ? settings.button_url.url : '#';
                var buttonAlignment = settings.button_alignment || 'left';
                var buttonIconHTML = elementor.helpers.renderIcon(view, settings.button_icon, { 'aria-hidden': true }, 'i', 'object');
                #>
                <div class="button-wrapper" style="text-align: {{ buttonAlignment }};">
                    <a href="{{ buttonUrl }}" class="advance-icon-button">
                        <# if (settings.icon_alignment === 'top' && buttonIconHTML.rendered) { #>
                        <div class="button-icon button-icon-top">{{{ buttonIconHTML.value }}}</div>
                        <# } #>

                        <# if (settings.icon_alignment === 'left' && buttonIconHTML.rendered) { #>
                        <span class="button-icon button-icon-left">{{{ buttonIconHTML.value }}}</span>
                        <# } #>

                        <span class="button-text">{{ buttonText }}</span>

                        <# if (settings.icon_alignment === 'right' && buttonIconHTML.rendered) { #>
                        <span class="button-icon button-icon-right">{{{ buttonIconHTML.value }}}</span>
                        <# } #>

                        <# if (settings.icon_alignment === 'bottom' && buttonIconHTML.rendered) { #>
                        <div class="button-icon button-icon-bottom">{{{ buttonIconHTML.value }}}</div>
                        <# } #>
                    </a>
                </div>
                <# } #>
            </div>
            <# if (settings.show_badge === 'yes') { #>
            <div class="badge badge-{{ settings.badge_position }}" {{{ badgeStyles }}}>{{{ settings.badge_title }}}</div>
            <# } #>
            </div>

            <# if (containerLink) { #>
        </a>
        <# } #>
        <?php
    }


    // Closing the method properly
}
    