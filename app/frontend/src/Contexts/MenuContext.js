import AXIOS from '../AxiosSetup'
import { useState, createContext } from "react";

const MenuContext = createContext()

export const MenuContextProvider = ({children})=>{
    const [menuTypes, setMenuTypes] = useState([])
    const [loading, setLoading] = useState(false)
    const [selectedMenu, setSelectedMenu] = useState({})
    const [menuItems, setMenuItems] = useState([])
    const [menuLoading, setMenuLoading] = useState(false)

    const getMenuTypes = async ()=>{
        setLoading(true)
        const url = 'home/menu/types'
        const res = await AXIOS.get(url)
        const data = await res.data
        setMenuTypes(data)
        setLoading(false)
        return data
    }

    const getMenuItems = async (slug, id)=>{
        setMenuLoading(true)
        const url = `/home/${slug}/${id}/menus`
        const res = await AXIOS.get(url)
        const data = await res.data
        setMenuItems(data)
        setMenuLoading(false)
        return data
    }

    return (
        <MenuContext.Provider value={{
            menuTypes,
            selectedMenu,
            menuItems,
            loading,
            menuLoading,
            getMenuTypes,
            setSelectedMenu,
            getMenuItems,
            setMenuItems,
            
        }}>
            {children}
        </MenuContext.Provider>
    )
}


export default MenuContext