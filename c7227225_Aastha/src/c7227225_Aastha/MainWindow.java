package c7227225_Aastha;
//REQUIREMENT 1 :Basic Currency Conversion 
import java.awt.BorderLayout;
import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;
import java.awt.Color;

@SuppressWarnings("serial")
public class MainWindow extends JFrame 
{
	private JPanel contentPane;
	
	public static void main(String[] args) 
	{
					//creating frame that instances MainWindow class
					MainWindow frame = new MainWindow();
					//setting the visibility of the frame to true
					frame.setVisible(true);
	}

	public MainWindow() 
	{
		setBackground(Color.WHITE);
		
		//adding title to the window 
		setTitle("Basic Currency Conversion ");
		
		//closing from the memory
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		
		//manually designing the layout
		setBounds(100, 100, 500, 330);
		
		//adding panel object to JFrame contentPane
		contentPane = new JPanel();
		contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));
		contentPane.setLayout(new BorderLayout(0, 0));
		setContentPane(contentPane);
		
		//creating an object that instances mainpanel class
		MainPanel panel=new MainPanel();
		//adding panel to the default panel of the class	
		contentPane.add(panel);
		//setting up menu for the panel
		setJMenuBar(panel.setupMenu());
		
	}
}


