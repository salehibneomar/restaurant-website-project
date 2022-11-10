import React from 'react'
import ItemGallery from './ItemGallery'
import SelectorNav from './SelectorNav'
import { useContext, useEffect } from 'react'
import MenuContext from '../Contexts/MenuContext'

function Main() {
  const {
    menuTypes, 
    getMenuTypes, 
    loading,
    getMenuItems,
    } = useContext(MenuContext)

  useEffect(()=>{
    getMenuTypes()
    .then((d)=> getMenuItems(d[0].slug, d[0].id))
    // eslint-disable-next-line react-hooks/exhaustive-deps
  },[])

  if(loading){
    return (<p className='text-center'>Loading...</p>)
  }

  return (
    <main>
        <SelectorNav types={menuTypes} />
        <ItemGallery />
    </main>
  )
}

export default Main
