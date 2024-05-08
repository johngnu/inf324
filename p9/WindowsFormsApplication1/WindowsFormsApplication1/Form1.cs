using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace WindowsFormsApplication1
{
    public partial class Form1 : Form
    {
        ServiceReference1.WebService1SoapClient ws = new ServiceReference1.WebService1SoapClient();

        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            if(textBox1.Text.Length == 0)
            {
                MessageBox.Show("Debe ingresar CI para modificar", "Mensaje");
            } 
            else
            {
                Form3 f3 = new Form3(textBox1.Text);
                f3.ShowDialog();
            }
        }

        private void Form1_Load(object sender, EventArgs e)
        {
            this.dataGridView1.DataSource = ws.listPersona().Tables["persona"];
            //en la web dataGridView1.databind()
        }

        private void dataGridView1_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {

        }

        private void button2_Click(object sender, EventArgs e)
        {
            Form2 f2 = new Form2(this.dataGridView1);
            f2.ShowDialog();
        }

        private void button3_Click(object sender, EventArgs e)
        {
            this.dataGridView1.DataSource = ws.listPersona().Tables["persona"];
            this.dataGridView1.Refresh();
        }

        private void button4_Click(object sender, EventArgs e)
        {
            if (textBox1.Text.Length == 0)
            {
                MessageBox.Show("Debe ingresar CI para eliminar", "Mensaje");
            }
            else
            {
                DialogResult dialogResult = MessageBox.Show("¿Seguro de eliminar: " + textBox1.Text + "?", "Aviso", MessageBoxButtons.YesNo);
                if (dialogResult == DialogResult.Yes)
                {
                    ws.delete(textBox1.Text);
                    this.dataGridView1.DataSource = ws.listPersona().Tables["persona"];
                    this.dataGridView1.Refresh();
                }
                else if (dialogResult == DialogResult.No)
                {
                    //do something else
                }
            }
        }
    }
}
