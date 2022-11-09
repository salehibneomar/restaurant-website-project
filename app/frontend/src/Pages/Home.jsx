import React, { useContext, useEffect } from 'react'
import Main from '../Components/Main'
import About from '../Components/About'
import SiteInformationsContext from '../Contexts/SiteInformationsContext'

function Home() {
  const {getSiteInformations, 
        siteInformations, 
        loading} = useContext(SiteInformationsContext)

  useEffect(()=>{
    document.title = "Home"
        getSiteInformations()
    // eslint-disable-next-line react-hooks/exhaustive-deps
  }, [])

  return (
    <>
      <About about={siteInformations.about} loading={loading} />
      <Main />
    </>
  )
}

export default Home
