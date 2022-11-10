import React from 'react'
import {Link} from 'react-router-dom'

function SingleItem({item}) {
  return (
    <>
    	<article className="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
			<figure>
				<img src={item.image_url} alt="" className="img-fluid tm-gallery-img" />
				<figcaption>
					<Link to={`menu/items/${item.id}`} className="tm-gallery-title">
						{item.name}
					</Link>
					<p className="tm-gallery-price">
						BDT {(item.price).toLocaleString()}
					</p>
				</figcaption>
			</figure>
		</article>
    </>
  )
}

export default SingleItem
