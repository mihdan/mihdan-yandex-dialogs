<?php
namespace Mihdan_Yandex_Dialogs;

class Settings {
	/**
	 * @var OSA $osa экземпляр.
	 */
	private $osa;

	public function __construct( $osa ) {
		$this->osa = $osa;

		$this->setup();
	}

	public function setup() {
		$this->osa->add_section(
			array(
				'id'    => 'basic',
				'title' => __( 'Basic Settings', 'mihdan-yandex-dialogs' ),
			)
		);

		$this->osa->add_field(
			'basic',
			array(
				'id'      => 'guid',
				'type'    => 'text',
				'name'    => __( 'Guid', 'mihdan-yandex-dialogs' ),
				'desc'    => __( 'Идентификатор чата', 'mihdan-yandex-dialogs' ),
				'default' => '',
			)
		);

		$this->osa->add_field(
			'basic',
			array(
				'id'      => 'title',
				'type'    => 'text',
				'name'    => __( 'Title', 'mihdan-yandex-dialogs' ),
				'desc'    => __( 'Заголовок виджета.', 'mihdan-yandex-dialogs' ),
				'default' => 'Чат',
			)
		);

		$this->osa->add_field(
			'basic',
			array(
				'id'      => 'button_text',
				'type'    => 'text',
				'name'    => __( 'Button Text', 'mihdan-yandex-dialogs' ),
				'desc'    => __( 'Текст, отображаемый на кнопке виджета.', 'mihdan-yandex-dialogs' ),
				'default' => 'Связаться с нами',
			)
		);

		$this->osa->add_field(
			'basic',
			array(
				'id'      => 'theme',
				'type'    => 'select',
				'name'    => __( 'Theme', 'WPOSA' ),
				'desc'    => __( 'Внешний вид виджета.', 'WPOSA' ),
				'options' => array(
					'light' => 'Белый фон кнопки виджета',
					'dark'  => 'Чёрный фон кнопки виджета',
				),
				'default' => 'dark',
			)
		);

		$this->osa->add_field(
			'basic',
			array(
				'id'      => 'collapsed_desktop',
				'type'    => 'select',
				'name'    => __( 'Collapsed Desktop', 'WPOSA' ),
				'desc'    => __( 'Отображение кнопки виджета на десктопе.', 'WPOSA' ),
				'options' => array(
					'always' => 'Кнопка виджета содержит только логотип',
					'hover'  => 'Текст на кнопке виджета открывается при наведении',
					'never'  => 'Кнопка виджета содержит логотип и текст',
				),
				'default' => 'never',
			)
		);

		$this->osa->add_field(
			'basic',
			array(
				'id'      => 'collapsed_touch',
				'type'    => 'select',
				'name'    => __( 'Collapsed Touch', 'WPOSA' ),
				'desc'    => __( 'Отображение иконки виджета в мобильном приложении.', 'WPOSA' ),
				'options' => array(
					'always' => 'Кнопка виджета содержит только логотип',
					'never'  => 'Кнопка виджета содержит логотип и текст',
				),
				'default' => 'never',
			)
		);
	}
}

// eol.
