import React from 'react'

function HeaderLogo({icon, name}) {
  return (
    <div className="col-md-6 col-12">
        <img src={icon} alt="" className="tm-site-logo" /> 
        <div className="tm-site-text-box">
            <h1 className="tm-site-title">{name}</h1>
        </div>
    </div>
  )
}

export default HeaderLogo
