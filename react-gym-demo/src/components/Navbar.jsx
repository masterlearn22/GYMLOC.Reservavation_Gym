import React from 'react';

const Navbar = () => {
  return (
    <div className="container top-0 position-sticky z-index-sticky" style={{ zIndex: 1030 }}>
      <div className="row">
        <div className="col-12">
          <nav className="top-0 mx-4 my-3 shadow navbar navbar-expand-lg blur border-radius-xl position-absolute start-0 end-0" style={{ borderRadius: '1rem' }}>
            <div className="px-0 container-fluid">
              <a className="flex-shrink-0 text-sm navbar-brand font-weight-bolder ms-sm-3 me-3" href="#home">
                GYMLOC
              </a>
              
              <button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span className="navbar-toggler-icon"><i className="fas fa-bars text-white"></i></span>
              </button>

              <div className="collapse navbar-collapse" id="navbarNav">
                <ul className="navbar-nav ms-auto d-flex align-items-center ml-auto">
                  <li className="nav-item d-none d-lg-block">
                    <form className="d-flex align-items-center mb-0" onSubmit={(e) => e.preventDefault()}>
                      <div className="input-group mr-3">
                        <span className="bg-white input-group-text border-end-0" style={{borderTopRightRadius: 0, borderBottomRightRadius: 0}}>
                          <i className="fas fa-search text-dark"></i>
                        </span>
                        <input type="search" className="form-control border-start-0" placeholder="Cari gym" aria-label="Search" style={{borderTopLeftRadius: 0, borderBottomLeftRadius: 0}} />
                      </div>
                    </form>
                  </li>
                  
                  <li className="nav-item">
                    <a className="nav-link font-weight-bolder" href="#gym-locations">
                      Cari GYM
                    </a>
                  </li>
                  
                  <li className="nav-item">
                    <a className="nav-link font-weight-bolder" href="#gym-locations">
                      Daftar Gym
                    </a>
                  </li>

                  <li className="nav-item">
                    <a className="nav-link font-weight-bolder" href="#gym-benefits">
                      Tentang Kami
                    </a>
                  </li>

                  <li className="nav-item ml-2">
                    <a href="#" className="nav-link font-weight-bolder">Login</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </div>
  );
};

export default Navbar;
