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
        public DataSet listPersona()
        {
            SqlConnection con = new SqlConnection();
            con.ConnectionString = "server=(local);user=sa;pwd=123;database=BDJohn";
            SqlDataAdapter ada = new SqlDataAdapter();
            ada.SelectCommand = new SqlCommand();
            ada.SelectCommand.Connection = con;
            ada.SelectCommand.CommandText = "select * from persona";
            ada.SelectCommand.CommandType = CommandType.Text;
            DataSet ds = new DataSet();
            ada.Fill(ds, "persona");
            return ds;
        }

        [WebMethod]
        public void persist(string ci, string nombres, string paterno, string materno, string direccion, int celular)
        {
            SqlConnection con = new SqlConnection();
            con.ConnectionString = "server=(local);user=sa;pwd=123;database=BDJohn";
            con.Open();
            string insert_query = "insert into persona(ci,nombres,paterno,materno,direccion,celular) values (@ci ,@nombres ,@paterno ,@materno, @direccion, @celular)";
            SqlCommand cmd = new SqlCommand(insert_query, con);
            cmd.Parameters.AddWithValue("@ci", ci);
            cmd.Parameters.AddWithValue("@nombres", nombres);
            cmd.Parameters.AddWithValue("@paterno", paterno);
            cmd.Parameters.AddWithValue("@materno", materno);
            cmd.Parameters.AddWithValue("@direccion", direccion);
            cmd.Parameters.AddWithValue("@celular", celular);
            cmd.ExecuteNonQuery();
            con.Close();
        }

        [WebMethod]
        public void update(string ci, string nombres, string paterno, string materno, string direccion, int celular)
        {
            SqlConnection con = new SqlConnection();
            con.ConnectionString = "server=(local);user=sa;pwd=123;database=BDJohn";
            con.Open();
            string insert_query = "update persona set nombres=@nombres,paterno=@paterno,materno=@materno,direccion=@direccion,celular=@celular where ci=@ci";
            SqlCommand cmd = new SqlCommand(insert_query, con);
            cmd.Parameters.AddWithValue("@ci", ci);
            cmd.Parameters.AddWithValue("@nombres", nombres);
            cmd.Parameters.AddWithValue("@paterno", paterno);
            cmd.Parameters.AddWithValue("@materno", materno);
            cmd.Parameters.AddWithValue("@direccion", direccion);
            cmd.Parameters.AddWithValue("@celular", celular);
            cmd.ExecuteNonQuery();
            con.Close();
        }

        [WebMethod]
        public void delete(string ci)
        {
            SqlConnection con = new SqlConnection();
            con.ConnectionString = "server=(local);user=sa;pwd=123;database=BDJohn";
            con.Open();
            string insert_query = "delete from persona where ci=@ci";
            SqlCommand cmd = new SqlCommand(insert_query, con);
            cmd.Parameters.AddWithValue("@ci", ci);
            cmd.ExecuteNonQuery();
            con.Close();
        }

        [WebMethod]
        public string getPersona(string ci)
        {
            SqlConnection con = new SqlConnection();
            con.ConnectionString = "server=(local);user=sa;pwd=123;database=BDJohn";
            SqlDataAdapter ada = new SqlDataAdapter();
            ada.SelectCommand = new SqlCommand();
            ada.SelectCommand.Connection = con;
            ada.SelectCommand.CommandText = "select * from persona where ci='" + ci + "'";
            ada.SelectCommand.CommandType = CommandType.Text;
            con.Open();
            string outtext = "";
            using (SqlDataReader reader = ada.SelectCommand.ExecuteReader())
            {
                if (reader.Read())
                {
                    outtext = reader["nombres"] + ":" + reader["paterno"] + ":" + reader["materno"] + ":" + reader["direccion"] + ":" + reader["celular"];
                }
            }

            return outtext;
        }
    }
}
