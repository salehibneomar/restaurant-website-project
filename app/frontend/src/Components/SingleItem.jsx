import React from 'react'

function SingleItem() {
  return (
    <>
    	<article className="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
						<figure>
							<img src="assets/img/gallery/01.jpg" alt="" className="img-fluid tm-gallery-img" />
							<figcaption>
								<h4 className="tm-gallery-title">Fusce dictum finibus</h4>
								<p className="tm-gallery-description">Nam in suscipit nisi, sit amet consectetur metus. Ut sit amet tellus accumsan</p>
								<p className="tm-gallery-price">$45 / $55</p>
							</figcaption>
						</figure>
			</article>
    </>
  )
}

export default SingleItem
