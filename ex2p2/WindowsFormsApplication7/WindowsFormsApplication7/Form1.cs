using System;
using System.Collections.Generic;
using System.ComponentModel;

using System.Data;
using System.Data.SqlClient;

using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Diagnostics;

namespace WindowsFormsApplication7
{
    public partial class Form1 : Form
    {
        int cR, cG, cB;
        string cs = "server=(local);user=sa;pwd=123;database=parcial2";
        public Form1()
        {
            InitializeComponent();
        }

        private void dataGridView1_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {
            
        }

        public void llenar() {
            SqlConnection con = new SqlConnection();
            SqlDataAdapter ada = new SqlDataAdapter();
            DataSet ds = new DataSet();
            con.ConnectionString = cs;

            ada.SelectCommand = new SqlCommand();
            ada.SelectCommand.Connection = con;
            ada.SelectCommand.CommandText = "select * from texturas";

            ada.Fill(ds);

            this.dataGridView1.DataSource = ds.Tables[0];
        }

        private void Form1_Load(object sender, EventArgs e)
        {
            llenar();
            String[] colores = Enum.GetNames(typeof(System.Drawing.KnownColor));
            comboBox1.Items.AddRange(colores);
            label12.Text = "";
        }

        private void button1_Click(object sender, EventArgs e)
        {
            openFileDialog1.Filter = "archivos jpg|*.jpg";
            openFileDialog1.ShowDialog();
            Bitmap bmp = new Bitmap(openFileDialog1.FileName);
            pictureBox1.Image = bmp;
            pictureBox2.Image = bmp;
        }

        private void label7_Click(object sender, EventArgs e)
        {

        }

        private void button2_Click(object sender, EventArgs e)
        {
            SqlConnection con = new SqlConnection();
            SqlCommand cmd = new SqlCommand();
            String sql;
            con.ConnectionString = cs;
            cmd.Connection = con;
            sql = "insert into texturas(descripcion,colorr,colorg,colorb,pintar) ";
            sql = sql + "values (@descripcion,@colorr,@colorg,@colorb,@pintar)";
            cmd.CommandText = sql;
            cmd.Parameters.Add("@descripcion", SqlDbType.VarChar, 50).Value = textBox4.Text;
            cmd.Parameters.Add("@colorr", SqlDbType.Int).Value = textBox1.Text;
            cmd.Parameters.Add("@colorg", SqlDbType.Int).Value = textBox2.Text;
            cmd.Parameters.Add("@colorb", SqlDbType.Int).Value = textBox3.Text;
            cmd.Parameters.Add("@pintar", SqlDbType.VarChar, 50).Value = comboBox1.Text;

            con.Open();
            cmd.ExecuteNonQuery();
            con.Close();
            llenar();
        }

        private void button3_Click(object sender, EventArgs e)
        {
            label12.Text = "";
            pictureBox2.Image = pictureBox1.Image;
            for (int i=0;i<dataGridView1.RowCount-1; i++) {
                String pintar = dataGridView1.Rows[i].Cells[4].Value.ToString();
                int r = Convert.ToInt32(dataGridView1.Rows[i].Cells[1].Value.ToString());
                int g = Convert.ToInt32(dataGridView1.Rows[i].Cells[2].Value.ToString());
                int b = Convert.ToInt32(dataGridView1.Rows[i].Cells[3].Value.ToString());
                String objeto = dataGridView1.Rows[i].Cells[0].Value.ToString();
                texturasimagen2(r, g, b, pintar,objeto);
            }            
        }

        private void button4_Click(object sender, EventArgs e)
        {
            pictureBox2.Image = pictureBox1.Image;
            for (int i = 0; i < dataGridView1.RowCount - 1; i++)
            {
                String pintar = dataGridView1.Rows[i].Cells[4].Value.ToString();
                int r = Convert.ToInt32(dataGridView1.Rows[i].Cells[1].Value.ToString());
                int g = Convert.ToInt32(dataGridView1.Rows[i].Cells[2].Value.ToString());
                int b = Convert.ToInt32(dataGridView1.Rows[i].Cells[3].Value.ToString());
                String objeto = dataGridView1.Rows[i].Cells[0].Value.ToString();
                texturasimagen2(r, g, b, pintar, objeto);
            }
        }

        private void comboBox1_DrawItem(object sender, DrawItemEventArgs e)
        {
        }

        private void comboBox1_SelectionChangeCommitted(object sender, EventArgs e)
        {
        }

        private void button4_Click_1(object sender, EventArgs e)
        {
            pictureBox2.Image = pictureBox1.Image;
        }

        private void dataGridView1_CellClick(object sender, DataGridViewCellEventArgs e)
        {
            textBox1.Text = dataGridView1.Rows[e.RowIndex].Cells[1].Value.ToString();
            textBox2.Text = dataGridView1.Rows[e.RowIndex].Cells[2].Value.ToString();
            textBox3.Text = dataGridView1.Rows[e.RowIndex].Cells[3].Value.ToString();
            textBox4.Text = dataGridView1.Rows[e.RowIndex].Cells[0].Value.ToString();
            comboBox1.Text = dataGridView1.Rows[e.RowIndex].Cells[4].Value.ToString();
        }

        private void button5_Click(object sender, EventArgs e)
        {
            SqlConnection con = new SqlConnection();
            SqlCommand cmd = new SqlCommand();
            String sql;
            con.ConnectionString = "server=(local);user=u324;pwd=123456;database=parcial2";
            cmd.Connection = con;
            sql = "TRUNCATE TABLE texturas";
            cmd.CommandText = sql;

            con.Open();
            cmd.ExecuteNonQuery();
            con.Close();
            llenar();
        }

        private void button6_Click(object sender, EventArgs e)
        {

        }

        private void pictureBox1_MouseClick(object sender, MouseEventArgs e)
        {
            Bitmap bmp = new Bitmap(pictureBox1.Image);
            Color c = new Color();
            int sR, sG, sB;
            sR = 0;
            sG = 0;
            sB = 0;
            for (int i = e.X; i < e.X + 10; i++)
                for (int j = e.Y; j < e.Y + 10; j++)
                {
                    c = bmp.GetPixel(i, j);
                    sR = sR + c.R;
                    sG = sG + c.G;
                    sB = sB + c.B;
                }
            sR = sR / 100;
            sG = sG / 100;
            sB = sB / 100;
            cR = sR;
            cG = sG;
            cB = sB;
            textBox1.Text = sR.ToString();
            textBox2.Text = sG.ToString();
            textBox3.Text = sB.ToString();
        }
        public void texturasimagen2(int R,int G, int B,String pintar,String objeto) {
            Bitmap bmp = new Bitmap(pictureBox2.Image);
            Bitmap bmp2 = new Bitmap(bmp.Width, bmp.Height);
            Color c = new Color();
            int reconoce = 0;
            Color c2 = Color.FromName(pintar);
            label13.Text = pintar +": " + c2.R + "-" + c2.G + "-" + c2.B + "\n" + label13.Text;
            int sR, sG, sB;
            int cont1 = 0;
            int cont2 = 0;
            for (int i = 0; i < bmp.Width - 10; i = i + 10)
                for (int j = 0; j < bmp.Height - 10; j = j + 10)
                {
                    sR = 0; sG = 0; sB = 0;
                    for (int ip = i; ip < i + 10; ip++) { 
                        for (int jp = j; jp < j + 10; jp++)
                        {
                            c = bmp.GetPixel(ip, jp);
                            sR = sR + c.R;
                            sG = sG + c.G;
                            sB = sB + c.B;
                        }
                    }
                    sR = sR / 100;
                    sG = sG / 100;
                    sB = sB / 100;

                    Debug.WriteLine("color: " + sR + " "+ sG + " " + sB);

                    if (((R - 20 <= sR) && (sR <= R + 20)) && ((G - 20 <= sG) && (sG <= G + 20)) && ((B - 20 <= sB) && (sB <= B + 20)))
                    {
                        reconoce = 1;
                        for (int ip = i; ip < i + 10; ip++)
                            for (int jp = j; jp < j + 10; jp++)
                            {
                                bmp2.SetPixel(ip, jp, c2);
                                cont1++;
                            }
                    }
                    else
                    {
                        for (int ip = i; ip < i + 10; ip++)
                            for (int jp = j; jp < j + 10; jp++)
                            {
                                c = bmp.GetPixel(ip, jp);
                                bmp2.SetPixel(ip, jp, Color.FromArgb(c.R, c.G, c.B));
                                cont2++;
                            }
                    }

                }
            pictureBox2.Image = bmp2;
            if (reconoce>0) {
                label12.Text = ""+cont1+" de "+cont2+ " objetos " +objeto+" pintados de color "+pintar+"\n"+label12.Text;
            }
        }
    }
}
