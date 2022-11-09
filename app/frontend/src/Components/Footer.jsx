import React, { useContext } from 'react'
import SiteInformationsContext from '../Contexts/SiteInformationsContext'

function Footer() {
  const {siteInformations : {name}} = useContext(SiteInformationsContext)
  return (
    <footer className="tm-footer text-center">
        <p>Copyright &copy; {(new Date()).getFullYear() +", "+name} 
        
        | Developer: Saleh Ibne Omar</p>
    </footer>
  )
}

export default Footer
