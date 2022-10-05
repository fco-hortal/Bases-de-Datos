<div class=\"dropdown\">
                  <button type=\"button\" class=\"btn btn-primary dropdown-toggle\" id=\"dropdownMenu2\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\"><i class=\"far fa-eye\"></i>
                  Registrar permiso para
                  </button>

                  <div class=\"dropdown-menu\" aria-labelledby=\"dropdownMenu2\">

                    <form action=\"../main/main_PuertosPermisosAstilleros.php\" method=\"post\">
                      <input type=\"hidden\" class=\"form-control\" name=\"id\" value=\"$r[0]\">
                      <input type=\"hidden\" class=\"form-control\" name=\"name\" value=\"$r[1]\">
                      <button type=\"input\" class=\"btn btn-primary\"><i class=\"far fa-eye\"></i>Astillero</button>
                    </form>  

                    <form action=\"../main/main_PuertosPermisosMuelles.php\" method=\"post\">
                      <input type=\"hidden\" class=\"form-control\" name=\"id\" value=\"$r[0]\">
                      <input type=\"hidden\" class=\"form-control\" name=\"name\" value=\"$r[1]\">
                      <button type=\"input\" class=\"btn btn-primary\"><i class=\"far fa-eye\"></i>Muelle</button>
                   </form>  

                  </div>
                </div>