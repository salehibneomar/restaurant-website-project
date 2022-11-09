import React, { useContext, useEffect } from 'react'
import HeaderLogo from './HeaderLogo'
import HeaderNav from './HeaderNav'
import SiteInformationsContext from '../Contexts/SiteInformationsContext'

function Header() {

  const {siteInformations : {icon_url, name},
         getSiteInformations,
        } = useContext(SiteInformationsContext)
  
  useEffect(()=>{
    getSiteInformations().then((d)=>document.title = d.name)
      // eslint-disable-next-line react-hooks/exhaustive-deps
  }, [])     


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
