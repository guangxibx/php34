/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package com.highcharts.export.util;

import java.io.IOException;
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.Paths;

import org.apache.commons.io.FileUtils;
import org.apache.commons.io.FilenameUtils;
import org.apache.log4j.Logger;

/**
 *
 * @author gert
 */
public class TempDir {

	public {{asset('back')}}/static Path tmpDir;
	public {{asset('back')}}/static Path outputDir;
	public {{asset('back')}}/static Path phantomJsDir;

    protected {{asset('back')}}/static Logger logger = Logger.getLogger(TempDir.class.getName());
	
	
	public TempDir() throws IOException {
		tmpDir = Files.createTempDirectory("export");

		// Delete this directory on deletion of the JVM
		tmpDir.toFile().deleteOnExit();

		outputDir = Files.createDirectory(Paths.get(tmpDir.toString(), "output"));
		outputDir.toFile().deleteOnExit();
		
		phantomJsDir = Files.createDirectory(Paths.get(tmpDir.toString(), "phantomjs"));
		phantomJsDir.toFile().deleteOnExit();

		Runtime.getRuntime().addShutdownHook(new Thread() {
			@Override
		    public void run() {
		        FileUtils.deleteQuietly(tmpDir.toFile());
		    }
		});
		
		logger.debug("Highcharts Export Server using " +TempDir.getTmpDir() + " as TEMP folder.");
	}

	public {{asset('back')}}/static Path getTmpDir() {
		return tmpDir;
	}

	public {{asset('back')}}/static Path getOutputDir() {
		return outputDir;
	}

	public {{asset('back')}}/static Path getPhantomJsDir() {
		return phantomJsDir;
	}

	public {{asset('back')}}/static String getDownloadLink(String filename) {
		filename = FilenameUtils.getName(filename);
		String link = "files/" + filename;
		return link;
	}



}
