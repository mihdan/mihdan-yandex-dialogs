<?php
class Main {
	public function __construct() {
		$this->setup();
		$this->hooks();
	}
	public function setup() {}
	public function hooks() {
		add_action( 'wp_footer', array( $this, 'render' ) );
	}
	public function render() {
		?>
		<script type='text/javascript'>
			(function () {
				window['yandexChatWidgetCallback'] = function() {
					try {
						window.yandexChatWidget = new Ya.ChatWidget({
							guid: '988863b4-1fa7-45e6-ba04-c695b90c45fa',
							buttonText: '',
							title: 'Чат',
							theme: 'light',
							collapsedDesktop: 'never',
							collapsedTouch: 'never'
						});
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