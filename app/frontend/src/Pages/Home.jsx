import React, { useEffect, useContext } from 'react'
import Main from '../Components/Main'
import About from '../Components/About'
import SiteInformationsContext from '../Contexts/SiteInformationsContext'

function Home() {

  const {siteInformations : {about}, loading} = useContext(SiteInformationsContext)

  useEffect(()=>{
    document.title = 'Home'
    // eslint-disable-next-line react-hooks/exhaustive-deps
  }, [])

  return (
    <>
      <About about={about} loading={loading} />
      <Main />
    </>
  )
}

export default Home
