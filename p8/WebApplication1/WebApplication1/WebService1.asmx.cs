using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Services;
using System.Data;
using System.Data.SqlClient;

namespace WebApplication1
{
    /// <summary>
    /// Descripción breve de WebService1
    /// </summary>
    [WebService(Namespace = "http://tempuri.org/")]
    [WebServiceBinding(ConformsTo = WsiProfiles.BasicProfile1_1)]
    [System.ComponentModel.ToolboxItem(false)]
    // Para permitir que se llame a este servicio web desde un script, usando ASP.NET AJAX, quite la marca de comentario de la línea siguiente. 
    // [System.Web.Script.Services.ScriptService]
    public class WebService1 : System.Web.Services.WebService
    {

        [WebMethod]
        public string HelloWorld()
        {
            return "Hola a todos";
        }

        [WebMethod]
        public string HolaMundo()
        {
            return "Hola a todos";
        }

        [WebMethod]
        public int suma(int a, int b)
        {
            return a+b;
        }

        [WebMethod]
        public DataSet dsAlumno()
        {
            SqlConnection con = new SqlConnection();
            con.ConnectionString = "server=(local);user=u324;pwd=123456;database=academico";
            SqlDataAdapter ada = new SqlDataAdapter();
            ada.SelectCommand = new SqlCommand();
            ada.SelectCommand.Connection = con;
            ada.SelectCommand.CommandText = "select * from alumno";
            ada.SelectCommand.CommandType = CommandType.Text;
            DataSet ds = new DataSet();
            ada.Fill(ds, "alumno");
            return ds;
        }

    }
}
