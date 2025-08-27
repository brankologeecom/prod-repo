declare let wp;

document.addEventListener( 'DOMContentLoaded', () => {
	const clearDatabaseLink = document.querySelector(
		'#woocommerce_cawl-for-woocommerce_clear_data_on_uninstall ~ a'
	) as HTMLAnchorElement | null;

	if ( ! clearDatabaseLink ) {
		return;
	}

	clearDatabaseLink.addEventListener( 'click', ( event ) => {
		// eslint-disable-next-line no-alert
		const confirmed = window.confirm(
			wp.i18n.__(
				'Are you sure you want to clear all CAWL plugin data from the database? This action cannot be undone.',
				'cawl-for-woocommerce'
			)
		);

		if ( ! confirmed ) {
			event.preventDefault();
		}
	} );
} );
