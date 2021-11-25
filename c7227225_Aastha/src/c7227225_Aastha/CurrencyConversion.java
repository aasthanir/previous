package c7227225_Aastha;
// REQUIREMENT 2 : File Based Conversion
import java.awt.BorderLayout;
import java.awt.Color;
import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;

@SuppressWarnings("serial")
public class CurrencyConversion extends JFrame{
	private JPanel contentPane;
	
	public static void main(String[] args) 
	{
					//creating frame that instances CurrencyConversion class
					CurrencyConversion frame = new CurrencyConversion();
					//setting the visibility of the frame to true
					frame.setVisible(true);
	}
	
	public CurrencyConversion() 
	{
		setBackground(Color.WHITE);
		
		//adding title to the window 
		setTitle("File Based Conversion");
		
		//closing from the memory
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		
		//manually designing the layout
		setBounds(100, 100, 500, 330);
		
		//adding panel object to JFrame contentPane
		contentPane = new JPanel();
		contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));
		contentPane.setLayout(new BorderLayout(0, 0));
		setContentPane(contentPane);
		
		//creating an object that instances CurrencyPanel class
		CurrencyPanel panel=new CurrencyPanel();
		//adding panel to the default panel of the class
		contentPane.add(panel);
		//setting up menu for the panel
		setJMenuBar(panel.setupMenu());
	}

}

