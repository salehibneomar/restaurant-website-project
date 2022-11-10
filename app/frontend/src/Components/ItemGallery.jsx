import React from 'react'
import { useContext } from 'react'
import MenuContext from '../Contexts/MenuContext'
import SingleItem from './SingleItem'

function ItemGallery() {

  const {menuLoading, menuItems} = useContext(MenuContext)

  if(menuLoading){
    return (<p className='text-center'>Loading...</p>)
  }

  return (
    <div className="row tm-gallery">

        <div className="tm-gallery-page width-fix">

            {menuItems.map((data, index)=>{
              return (
                <SingleItem item={data} key={index} />
              )
            })}
            
        </div>

    </div>
  )
}

export default ItemGallery
