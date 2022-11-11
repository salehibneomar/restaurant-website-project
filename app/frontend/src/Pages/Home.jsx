import React, { useEffect, useContext } from 'react'
import Main from '../Components/Main'
import About from '../Components/About'
import SiteInformationsContext from '../Contexts/SiteInformationsContext'

function Home() {

  const {loading,
        siteInformations : {about}} 
        = useContext(SiteInformationsContext)

  return (
    <>
      <About about={about} loading={loading} />
      <Main />
    </>
  )
}

export default Home
