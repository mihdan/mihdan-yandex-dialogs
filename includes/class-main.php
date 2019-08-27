<?php
namespace Mihdan_Yandex_Dialogs;
class Main {
	/**
	 * @var OSA $osa.
	 */
	private $osa;

	/**
	 * @var Settings $settings.
	 */
	private $settings;

	/**
	 * @var Render $render
	 */
	private $render;

	public function __construct( $osa = null, $settings = null, $render = null ) {

		$this->includes();

		$this->osa = $osa;
		if ( ! $this->osa ) {
			$this->osa = new OSA();
		}

		$this->settings = $settings;
		if ( ! $this->settings ) {
			$this->settings = new Settings( $this->osa );
		}

		$this->render = $render;
		if ( ! $this->render ) {
			$this->render = new Render( $this->osa );
		}
	}
	public function includes() {
		//if ( is_admin() ) {
			require_once MIHDAN_YANDEX_DIALOGS_DIR . '/includes/class-osa.php';
			require_once MIHDAN_YANDEX_DIALOGS_DIR . '/includes/class-settings.php';
		//}

		//if ( ! is_admin() ) {
			require_once MIHDAN_YANDEX_DIALOGS_DIR . '/includes/class-render.php';
		//}
	}
}

new Main();

// eol.
