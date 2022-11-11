import React, { useEffect } from 'react'
import { useContext } from 'react'
import MenuContext from '../Contexts/MenuContext'

function SingleItemDetails() {
 
  const {singleMenuItem} = useContext(MenuContext)

  if( Object.keys(singleMenuItem).length===0){
    return (<p className='text-center'>Loading...</p>)
  }

  return (

    <div className="tm-container-inner tm-history">
        <div className="row">
            <div className="col-12 mx-auto">
                <div className="tm-history-inner">
                    <img src={singleMenuItem.image_url} alt="" className="img-fluid tm-history-img" />
                </div>
            </div>

            <div className="col-md-8 mx-auto mt-5 mb-5 item-details-section">
                <ul className="list-group">
                    <li className="list-group-item">
                        <b className='d-block mb-2'>Name:</b>
                           {singleMenuItem.name}
                    </li>
                    <li className="list-group-item">
                        <b className='d-block mb-2'>For:</b>
                           {singleMenuItem.type.name}
                    </li>
                    <li className="list-group-item">
                        <b className='d-block mb-2'>Price:</b>
                           BDT {(singleMenuItem.price).toLocaleString()}
                    </li>
                    <li className="list-group-item">
                        <b className='d-block mb-2'>Ingredients:</b>
                           {singleMenuItem.ingredients}
                    </li>
                    <li className="list-group-item">
                        <b className='d-block mb-2'>Description:</b>
                           {singleMenuItem.description}
                    </li>
                </ul>
            </div>
        </div>
    </div>
  )
}

export default SingleItemDetails
