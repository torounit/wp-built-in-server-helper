#!/usr/bin/env ruby
txtpath = File.join(File.dirname(__FILE__), "../readme.txt");
mdpath = File.join(File.dirname(__FILE__), "../readme.md");

badges = <<"EOS"
[![Build Status](https://travis-ci.org/torounit/wp-built-in-server-helper.svg)](https://travis-ci.org/torounit/wp-built-in-server-helper)
[![](https://img.shields.io/wordpress/plugin/dt/built-in-server-helper.svg)](https://wordpress.org/plugins/built-in-server-helper/)
[![](https://img.shields.io/wordpress/v/built-in-server-helper.svg)](https://wordpress.org/plugins/built-in-server-helper/)
[![](https://img.shields.io/wordpress/plugin/r/built-in-server-helper.svg)](https://wordpress.org/plugins/built-in-server-helper/)

EOS

string = File.read(txtpath, :encoding => Encoding::UTF_8);

string.gsub!( /^===\s([^=]+)\s===/, '# \1')
string.gsub!(/^==\s([^=]+)\s==/, '## \1')
string.gsub!(/^=\s([^=]+)\s=\r?\n?\*/, '### \1'+"\n\n\*")
string.gsub!(/^=\s([^=]+)\s=/, '### \1')
string.gsub!(/Contributors:.*\r?\n?/, "")
string.gsub!(/Tags:.*\r?\n?/, "")
string.gsub!(/Requires at least:.*\r?\n?/, "")
string.gsub!(/Tested up to:.*\r?\n?/, "")
string.gsub!(/Stable tag:.*\r?\n?/, "")
string.gsub!(/## Description/, "\n"+badges+"\n"+"## Description")

File.write(mdpath, string);