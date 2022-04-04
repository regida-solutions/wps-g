/**
 * WordPress dependencies
 */
import { useSelect } from '@wordpress/data';
import { store as coreStore } from '@wordpress/core-data';

function PreviewGallery({ images }) {
	const { getMedia } = useSelect((select) => {
		return {
			getMedia: select(coreStore).getMedia,
		};
	});

	const gallery = [];

	if (images.length > 0) {
		images.forEach((imageId) => {
			gallery.push(getMedia(imageId));
		});
	}

	return (
		<div className="wps-blocks-gallery">
			{gallery.map((image, index) => {
				if (!image) {
					return null;
				}

				const {
					media_details: mediaDetails = {
						sizes: { thumbnail: { source_url: '' } },
					},
				} = image;

				return (
					<div key={index} className="wps-blocks-gallery-item">
						<img
							className="wps-blocks-gallery-item__image"
							src={mediaDetails.sizes.thumbnail.source_url}
							alt={''}
						/>
					</div>
				);
			})}
		</div>
	);
}
export default PreviewGallery;
