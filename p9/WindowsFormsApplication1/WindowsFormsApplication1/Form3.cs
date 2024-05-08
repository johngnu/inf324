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
    public partial class Form3 : Form
    {
        ServiceReference1.WebService1SoapClient ws = new ServiceReference1.WebService1SoapClient();
        string ci;
        public Form3(string ci)
        {
            this.ci = ci;
            InitializeComponent();
        }

        private void label1_Click(object sender, EventArgs e)
        {

        }

        private void button2_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            ws.update(textBox1.Text, textBox2.Text, textBox3.Text, textBox4.Text, textBox5.Text, Convert.ToInt32(textBox6.Text));
            this.Close();
        }

        private void Form3_Load(object sender, EventArgs e)
        {
            textBox1.Text = ci;
            string[] data = ws.getPersona(ci).Split(':');
            textBox2.Text = data[0];
            textBox3.Text = data[1];
            textBox4.Text = data[2];
            textBox5.Text = data[3];
            textBox6.Text = data[4];
        }
    }
}
