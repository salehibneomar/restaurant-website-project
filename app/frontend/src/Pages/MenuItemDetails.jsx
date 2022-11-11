import React, { useEffect } from 'react'
import { useContext } from 'react'
import { useNavigate, useParams } from 'react-router-dom'
import SingleItemDetails from '../Components/SingleItemDetails'
import MenuContext from '../Contexts/MenuContext'

function MenuItemDetails() {
    const params = useParams()
    const navigate = useNavigate()
    const {getSingleMenuItem, loading} = useContext(MenuContext)

    useEffect(()=>{
        getSingleMenuItem(params.id).catch((e)=>navigate('/notfound'))
    }, [])

    return (
        <main>
            <header className="row tm-welcome-section">
                <h2 className="col-12 text-center tm-section-title">
                    Item Details
                </h2>
            </header>
            {loading  ? (<p className='text-center'>Loading...</p>) : <SingleItemDetails/>}
        </main>
    )
}

export default MenuItemDetails
