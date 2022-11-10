import { createContext, useState } from 'react'
import AXIOS from '../AxiosSetup'

const ContactContext = createContext()

export const ContactContextProvider = ({children})=>{

    const [socialMedia, setSocialMedia] = useState([])
    const [loading, setLoding] = useState(true)

    const getSocialMedia = async ()=>{
        setLoding(true)
        const url = 'contact/socials'
        const res = await AXIOS.get(url)
        const data = await res.data
        setSocialMedia(data)
        setLoding(false)
        return data
    }

    return (
        <ContactContext.Provider value={{
            socialMedia,
            loading,
            getSocialMedia,
        }}>
            {children}
        </ContactContext.Provider>
    )
}




export default ContactContext