/**
 * BLOCK: bs-arrow-banner
 *
 * Registering a basic block with Gutenberg.
 * Simple block, renders and saves the same content without any interactivity.
 */
const {__} = wp.i18n;
const {registerBlockType} = wp.blocks;
const {TextControl} = wp.components;
registerBlockType('bonseo/block-bs-banner-data', {
	title: __('Banner Data'),
	icon: 'editor-quote',
	category: 'bonseo-blocks',
	keywords: [
		__('bs-banner-data'),
		__('BonSeo'),
		__('BonSeo Block'),
	],
	edit: function ({posts, className, attributes, setAttributes}) {
		return (
			<div>
				<h2> Banner Data </h2>
				<TextControl
					className={`${className}__counter1`}
					label={__('Contador 1')}
					type="number"
					value={attributes.counter1}
					onChange={counter1 => setAttributes({counter1})}
				/>
				<TextControl
					className={`${className}__name1`}
					label={__('Nombre 1')}
					type="text"
					value={attributes.name1}
					onChange={name1 => setAttributes({name1})}
				/>
				<TextControl
					className={`${className}__counter2`}
					label={__('Contador 2')}
					type="number"
					value={attributes.counter2}
					onChange={counter2 => setAttributes({counter2})}
				/>
				<TextControl
					className={`${className}__name2`}
					label={__('Nombre 2')}
					type="text"
					value={attributes.name2}
					onChange={name2 => setAttributes({name2})}
				/>
				<TextControl
					className={`${className}__counter3`}
					label={__('Contador 3')}
					type="number"
					value={attributes.counter3}
					onChange={counter3 => setAttributes({counter3})}
				/>
				<TextControl
					className={`${className}__name3`}
					label={__('Nombre 3')}
					type="text"
					value={attributes.name3}
					onChange={name3 => setAttributes({name3})}
				/>
			</div>
		);
	},
	save: function () {
		return null;
	}
})
;
