import React, { useContext } from 'react'
import HeaderLogo from './HeaderLogo'
import HeaderNav from './HeaderNav'
import SiteInformationsContext from '../Contexts/SiteInformationsContext'

function Header() {

  const {siteInformations : {banner_url, icon_url, name},
        } = useContext(SiteInformationsContext)   


  return (
    <div className="placeholder" style={{backgroundImage: `url(${banner_url})`}}>
        <div className="parallax-window" >
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
