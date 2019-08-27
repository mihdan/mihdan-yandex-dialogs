<?php
namespace Mihdan_Yandex_Dialogs;

class Render {
	/**
	 * @var OSA $osa экземпляр.
	 */
	private $osa;

	public function __construct( $osa ) {
		$this->osa = $osa;

		$this->hooks();
	}

	public function hooks() {
		add_action( 'wp_footer', array( $this, 'render' ) );
	}

	public function render() {
		$options = array(
			'guid'             => $this->osa->get_option( 'guid', 'basic' ),
			'buttonText'       => $this->osa->get_option( 'button_text', 'basic' ),
			'title'            => $this->osa->get_option( 'title', 'basic', 'Чат' ),
			'theme'            => $this->osa->get_option( 'theme', 'basic', 'light' ),
			'collapsedDesktop' => $this->osa->get_option( 'collapsed_desktop', 'basic', 'never' ),
			'collapsedTouch'   => $this->osa->get_option( 'collapsed_touch', 'basic', 'never' ),
		);
		?>
		<script type='text/javascript'>
			(function () {
				window['yandexChatWidgetCallback'] = function() {
					try {
						window.yandexChatWidget = new Ya.ChatWidget(<?php echo json_encode( $options ); ?>);
					} catch(e) { }
				};
				var n = document.getElementsByTagName('script')[0],
					s = document.createElement('script');
				s.async = true;
				s.charset = 'UTF-8';
				s.src = 'https://chat.s3.yandex.net/widget.js';
				n.parentNode.insertBefore(s, n);
			})();
		</script>
		<?php
	}
}

// eol.
