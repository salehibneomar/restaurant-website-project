import React, { useContext } from 'react'
import SiteInformationsContext from '../Contexts/SiteInformationsContext'
import HeaderLogo from './HeaderLogo'
import HeaderNav from './HeaderNav'

function Header() {

  const {siteInformations: {banner_url, icon_url, name}, loading} = useContext(SiteInformationsContext)

  return (
    <div className="placeholder">
        <div 
        className="parallax-window" 
        data-parallax="scroll" 
        data-image-src="http://127.0.0.1:8000/images/banner/banner.jpg">
            <div className="tm-header">
                <div className="row tm-header-inner">
                    <HeaderLogo icon={icon_url} name={name} />
                    <HeaderNav />
                </div>
            </div>
        </div>
    </div>
  )
}

export default Header
