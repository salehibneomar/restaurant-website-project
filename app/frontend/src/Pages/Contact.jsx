import React, { useEffect } from 'react'

function Contact() {

    useEffect(()=>{
        document.title = "Contact"
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
                        <h4 className="tm-info-title tm-text-success">Our Address</h4>
                        <address>
                            180 Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus 10550
                        </address>
                        <a href="tel:080-090-0110" className="tm-contact-link">
                            <i className="fas fa-phone tm-contact-icon"></i>080-090-0110
                        </a>
                        <a href="mailto:info@company.co" className="tm-contact-link">
                            <i className="fas fa-envelope tm-contact-icon"></i>info@company.co
                        </a>
                        <div className="tm-contact-social">
                            <a href="https://fb.com/templatemo" className="tm-social-link"><i className="fab fa-facebook tm-social-icon"></i></a>
                            <a href="#" className="tm-social-link"><i className="fab fa-twitter tm-social-icon"></i></a>
                            <a href="#" className="tm-social-link"><i className="fab fa-instagram tm-social-icon"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
  )
}

export default Contact
