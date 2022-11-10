import React, { useEffect, useContext } from 'react'
import SiteInformationsContext from '../Contexts/SiteInformationsContext'
import ContactContext from '../Contexts/ContactContext'
import { Link } from 'react-router-dom'
import parse from 'html-react-parser'

function Contact() {

    const {getSiteInformations,
    siteInformations : {address,phone,email}} 
    = useContext(SiteInformationsContext)
    
    const {getSocialMedia, socialMedia, loading} = useContext(ContactContext) 

    useEffect(()=>{
        getSiteInformations().then((d)=>document.title = "Contact | "+d.name)
        getSocialMedia()
        // eslint-disable-next-line react-hooks/exhaustive-deps
    }, [])

  return (
    <main>
                
        <header className="row tm-welcome-section">
            <h2 className="col-12 text-center tm-section-title">Contact Page</h2>
        </header>

        <div className="tm-container-inner-2 tm-contact-section">
            <div className="row">
                <div className="contact-fix">
                    <div className="tm-address-box">
                        <h4 className="tm-info-title tm-text-success">
                            Our Address
                        </h4>
                        {loading ? 'Loading...' : (<>                        <address>
                            {address}
                        </address>
                        <Link to={`tel:${phone}`} className="tm-contact-link">
                            <i className="fas fa-phone tm-contact-icon">
                            </i>{phone}
                        </Link>
                        <Link to={`mailto:${email}`} className="tm-contact-link">
                            <i className="fas fa-envelope tm-contact-icon"></i>
                            {email}
                        </Link>
                        <div className="tm-contact-social">
                            {socialMedia.map((data, index)=>{
                                return (
                                <Link className="tm-social-link" key={index}>
                                    {parse(data.icon)}
                                </Link>
                                )
                            })}
                        </div></>)}
                    </div>
                </div>
            </div>
        </div>

    </main>
  )
}

export default Contact
