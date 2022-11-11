import React, { useContext } from 'react'
import HeaderLogo from './HeaderLogo'
import HeaderNav from './HeaderNav'
import SiteInformationsContext from '../Contexts/SiteInformationsContext'
import { useEffect } from 'react'
import { useNavigate } from 'react-router-dom'

function Header() {
  const navigate = useNavigate()
  const {siteInformations : {banner_url, icon_url, name},
          getSiteInformations,
        } = useContext(SiteInformationsContext)   

  useEffect(()=>{
    getSiteInformations().then((d)=>document.title = "Home | "+d.name)
    .catch(()=>navigate('/error'))
          // eslint-disable-next-line react-hooks/exhaustive-deps
  }, [])   

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
