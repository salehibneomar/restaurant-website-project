import { useState, createContext } from "react";
import AXIOS from '../AxiosSetup'

const SiteInformationsContext = createContext()

export const SiteInformationsContextProvider = ({children})=>{
    const [loading, setLoding] = useState(false)
    const [siteInformations, setSiteInformations] = useState({})

    const getSiteInformations = async ()=>{
        setLoding(true)
        const url = 'site/informations'
        const res = await AXIOS.get(url)
        const data = await res.data
        setSiteInformations(data)
        setLoding(false)
        return data
    }


    return (
        <SiteInformationsContext.Provider value={{
            loading,
            siteInformations,
            getSiteInformations,
        }}>
            {children}
        </SiteInformationsContext.Provider>
    );

}


export default SiteInformationsContext